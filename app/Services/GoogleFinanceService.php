<?php

namespace App\Services;

use App\Spiders\GoogleFinanceSpider;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RoachPHP\Roach;

class GoogleFinanceService
{
    public function scrapeTicker($ticker): mixed
    {

        if (! Cache::has($ticker)) {
            try {
                Roach::startSpider(GoogleFinanceSpider::class, context: ['ticker' => $ticker]);
            } catch (Exception $e) {
                Log::error($e);

                Cache::set($ticker, false, 3600);
                return false;
            }
        }

        $tickerData = Cache::get($ticker);

        $visit = DB::table('visits')->whereUrl($ticker)->first();
        if (! $visit) {
            DB::table('visits')->insert(['url' => $ticker, 'n_visits' => 1]);
        } else {
            DB::table('visits')->whereUrl($ticker)->update(['n_visits' => $visit->n_visits + 1]);
        }

        return $tickerData;
    }
}
