<?php

use App\Http\Controllers\ShippingAWBController;
use Illuminate\Support\Facades\Route;



Route::get('/shipping-awb', [ShippingAWBController::class, 'getShippingAWB']);
Route::post('/shipping-awb', [ShippingAWBController::class, 'getShippingAWB']);
