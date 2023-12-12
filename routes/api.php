<?php

use App\Http\Controllers\API\AuthenticationAPIController;
use App\Http\Controllers\API\InitAPIController;
use App\Http\Controllers\API\UserAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('authentication/authenticate', [AuthenticationAPIController::class, 'authenticate'])->name('authenticate');
Route::group([
    'prefix' => '/users'
], function () {
    Route::post('', [UserAPIController::class, 'create']);
});

Route::get('', function () {
    return 'halo';
})->name('halo');

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('inits', [InitAPIController::class, 'get']);

    Route::post('/authentication/logout', [AuthenticationAPIController::class, 'logout']);
});

