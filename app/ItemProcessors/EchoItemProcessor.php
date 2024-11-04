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
        /* echo "<pre>";
        echo var_dump($item);
        echo "</pre>"; */
        Cache::set($item->get('ticker_data')['quote'], $item->all(), 60);

        return $item;
    }
  
}