<?php

namespace App\ItemProcessors;

use Illuminate\Support\Facades\Cache;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class EchoItemProcessor implements ItemProcessorInterface
{
    use Configurable;

    public function processItem(ItemInterface $item): ItemInterface
    {
        $searchedTicker = $item->get('searched_ticker');
        $tickerData = $item->all();
        unset($tickerData['searched_ticker']);
        Cache::set($searchedTicker, $tickerData, 60);

        return $item;
    }
}
