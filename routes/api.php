<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRM\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/quotations',[CartController::class,'getQuotations'])->name('quotations');
Route::get('/houseTypes',[CartController::class,'getHouseTypes'])->name('houseTypes');
Route::get('/houseTypes/{houseType}/decorTypes',[CartController::class,'getDecorTypes'])->name('decorTypes');
Route::get('/decorType/{decorType}/des',[CartController::class,'getDescription'])->name('decorDes');
