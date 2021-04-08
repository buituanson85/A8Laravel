<?php

use App\Http\Controllers\Pages\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('addCart/{id}', [ CartController::class, 'addCart']);
Route::get('viewCartData', [ CartController::class, 'viewCartData']);
Route::get('updateCart/{rowId}/q/{quantity}', [ CartController::class, 'updateCart']);
