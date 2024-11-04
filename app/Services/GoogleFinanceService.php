<?php

namespace App\Services;

use RoachPHP\Roach;
use RoachPHP\Spider\Configuration\Overrides;
use App\Spiders\GoogleFinanceSpider;
use Illuminate\Support\Facades\Cache;
use Exception;

class GoogleFinanceService
{
  public function scrapeTicker($ticker) : mixed {

    if (!Cache::has($ticker)) {
      try {
        Roach::startSpider(GoogleFinanceSpider::class, new Overrides(startUrls: ['https://www.google.com/finance/quote/'.$ticker]));
      } catch ( Exception $e) {
        Cache::set($ticker, false, 3600);
        return false;
      }
    }

    $tickerData = Cache::get($ticker);

    return $tickerData;
  }

}