<?php

use App\Http\Controllers\LottoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Lottery;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|     y
*/

Route::get('/', [LottoController::class, 'index']);
Route::post('/', [LottoController::class, 'store']);
