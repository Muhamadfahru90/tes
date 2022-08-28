<?php

use App\Http\Controllers\API\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Produk;
use App\Http\Resources\UserCollection;
use App\Http\Resources\ProdukCollection;

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

Route::get('/produk', [App\Http\Controllers\API\ProdukController::class, 'fetch']);
Route::Get('/userapi', [App\Http\Controllers\API\UserController::class, 'index']);
