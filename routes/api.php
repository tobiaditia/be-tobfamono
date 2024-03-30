<?php

use App\Http\Controllers\API\AuthenticationAPIController;
use App\Http\Controllers\API\BusinessAPIController;
use App\Http\Controllers\API\BusinessCategoryAPIController;
use App\Http\Controllers\API\BusinessTransactionAPIController;
use App\Http\Controllers\API\BusinessTransactionItemAPIController;
use App\Http\Controllers\API\BusinessTransactionTypeAPIController;
use App\Http\Controllers\API\InitAPIController;
use App\Http\Controllers\API\UserAPIController;
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

Route::group([
    'prefix' => '/authentication'
], function () {
    Route::post('/authenticate', [AuthenticationAPIController::class, 'authenticate'])->name('authenticate');
    Route::post('/register', [AuthenticationAPIController::class, 'register'])->name('register');
    Route::get('/unauthenticated', function () {
        return response()->json([
            'message' => 'Unauthenticated',
            'success' => false,
        ], 401);
    })->name('unauthenticated');
});

Route::group([
    'prefix' => '/users'
], function () {
    Route::post('', [UserAPIController::class, 'create']);
});

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('inits', [InitAPIController::class, 'get']);

    Route::post('/authentication/logout', [AuthenticationAPIController::class, 'logout']);

    Route::group([
        'prefix' => '/businesses'
    ], function () {
        Route::get('', [BusinessAPIController::class, 'get']);
        Route::get('/{id}', [BusinessAPIController::class, 'find']);
        Route::post('', [BusinessAPIController::class, 'create']);
        Route::put('/{id}', [BusinessAPIController::class, 'update']);
        Route::delete('/{id}', [BusinessAPIController::class, 'delete']);
    });

    Route::group([
        'prefix' => '/businessTransactions'
    ], function () {
        Route::get('', [BusinessTransactionAPIController::class, 'get']);
        Route::get('/{businessId}/business', [BusinessTransactionAPIController::class, 'getByBusiness']);
        Route::get('/{id}', [BusinessTransactionAPIController::class, 'find']);
        Route::post('', [BusinessTransactionAPIController::class, 'create']);
        Route::put('/{id}', [BusinessTransactionAPIController::class, 'update']);
        Route::delete('/{id}', [BusinessTransactionAPIController::class, 'delete']);
    });

    Route::group([
        'prefix' => '/businessCategories'
    ], function () {
        Route::get('', [BusinessCategoryAPIController::class, 'get']);
    });

    Route::group([
        'prefix' => '/businessTransactionItems'
    ], function () {
        Route::get('', [BusinessTransactionItemAPIController::class, 'get']);
    });

    Route::group([
        'prefix' => '/businessTransactionTypes'
    ], function () {
        Route::get('', [BusinessTransactionTypeAPIController::class, 'get']);
    });

    Route::group([
        'prefix' => '/users'
    ], function () {
        Route::get('/{id}', [UserAPIController::class, 'find']);
    });
});
