<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InventoryController;

Route::post('/transaction', [InventoryController::class, 'addTransaction']);
Route::get('/summary', [InventoryController::class, 'summary']);
Route::get('/category-report', [InventoryController::class, 'groupByCategory']);
Route::get('/type-report', [InventoryController::class, 'groupByType']);