<?php

use App\Services\GoogleFinanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::get('{ticker}', function (Request $request, GoogleFinanceService $service, string $ticker) {

    if (! $tickerData = $service->scrapeTicker($ticker)) {
        return response()->json('Ticker not found', 404);
    }

    return response()->json($tickerData);
});
