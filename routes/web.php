<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/users/register', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'show']);
route::patch('/users/{id}', [App\Http\Controllers\UserController::class, 'update']);
route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy']);



require __DIR__ . '/auth.php';
