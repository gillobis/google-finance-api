<?php

use App\Services\GoogleFinanceService;
use App\Spiders\GoogleFinanceSpider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use RoachPHP\Roach;
use RoachPHP\Spider\Configuration\Overrides;


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


Route::get('{ticker}', function(Request $request, GoogleFinanceService $service, string $ticker){
    
    if (!$tickerData  = $service->scrapeTicker($ticker))
        return response()->json('Ticker not found' , 404);

    return response()->json($tickerData);
});