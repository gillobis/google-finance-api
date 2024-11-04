<?php

use Illuminate\Support\Facades\Route;
use App\Services\GoogleFinanceService;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

