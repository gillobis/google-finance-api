<?php

namespace App\Spiders;

use App\ItemProcessors\EchoItemProcessor;
use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Downloader\Middleware\UserAgentMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Request;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;

class GoogleFinanceSpider extends BasicSpider
{
    /* public array $startUrls = [
        'https://www.google.com/finance/quote/'
    ]; */

    public array $downloaderMiddleware = [
        [UserAgentMiddleware::class, [
            'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36',
        ]],
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        EchoItemProcessor::class,
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {
        $tickerData['searched_ticker'] = $this->context['ticker'];

        if (! $response->filter('.AHmHk .fxKbKc')->count()) {
            if ($response->filter('.sbnBtf.xJvDsc.ANokyb > li')->count() && ($link = $response->filter('.sbnBtf.xJvDsc.ANokyb > li:first-child a')->link())) {
                yield $this->request('GET', $link->getUri());
            }

            return;
        }

        // current price, quote, title extraction
        $tickerData['ticker_data']['current_price'] = $response->filter('.AHmHk .fxKbKc')->text();
        $tickerData['ticker_data']['quote'] = str_replace(' • ', ':', $response->filter('.PdOqHc')->innerText());
        $tickerData['ticker_data']['title'] = $response->filter('.zzDege')->text();

        // about panel extraction
        $aboutPanelKeys = $response->filter('.gyFHrc .mfs7Fc')->each(function ($node) {
            return $node->text();
        });
        $aboutPanelValues = $response->filter('.gyFHrc .P6K39c')->each(function ($node) {
            return $node->text();
        });

        $tickerData['about_panel'] = [];
        foreach (array_combine($aboutPanelKeys, $aboutPanelValues) as $key => $value) {
            $keyValue = str_replace(' ', '_', strtolower($key));
            $tickerData['about_panel'][$keyValue] = $value;
        }

        // description "about" extraction
        $tickerData['about_panel']['description'] = $response->filter('.bLLb2d')->text('');
        $tickerData['about_panel']['extensions'] = $response->filter('.w2tnNd')->text('');

        // finance perfomance table
        if ($response->filter('.slpEwd .roXhBd')->count()) {
            $fin_perf_col_2 = $response->filter('.PFjsMe+ .yNnsfe')->text();
            $fin_perf_col_3 = $response->filter('.PFjsMe~ .yNnsfe+ .yNnsfe')->text();

            $tickerData['finance_performance']['table'] = [];
            $response->filter('.slpEwd .roXhBd')->each(function ($node) use ($fin_perf_col_2, $fin_perf_col_3, &$tickerData) {

                if ($node->filter('.J9Jhg .rsPbEe')->count()) {
                    $perf_key = $node->filter('.J9Jhg  .rsPbEe')->text();
                    $perf_value_col_1 = $node->filter('.QXDnM')->text();
                    $perf_value_col_2 = $node->filter('.gEUVJe .JwB6zf')->text('-');

                    $tickerData['finance_performance']['table'] = [
                        $perf_key => [
                            $fin_perf_col_2 => $perf_value_col_1,
                            $fin_perf_col_3 => $perf_value_col_2,
                        ],
                    ];
                }
            });
        } else {
            $tickerData['finance_performance']['table'] = 'No finance performance table found';
        }

        yield $this->item($tickerData);
    }

    /** @return Request[] */
    protected function initialRequests(): array
    {
        $url = 'https://www.google.com/finance/quote/' . $this->context['ticker'];

        return [
            new Request(
                'GET',
                $url,
                // Specify a different parse method for
                // the intial request.
                [$this, 'parse']
            ),
        ];
    }
}
