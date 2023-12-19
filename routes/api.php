<?php

use App\Http\Controllers\API\AuthenticationAPIController;
use App\Http\Controllers\API\BusinessAPIController;
use App\Http\Controllers\API\BusinessCategoryAPIController;
use App\Http\Controllers\API\InitAPIController;
use App\Http\Controllers\API\TransactionAPIController;
use App\Http\Controllers\API\TransactionItemAPIController;
use App\Http\Controllers\API\TransactionTypeAPIController;
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

Route::group([
    'prefix' => '/authentication'
], function () {
    Route::post('/authenticate', [AuthenticationAPIController::class, 'authenticate'])->name('authenticate');
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
        'prefix' => '/transactions'
    ], function () {
        Route::get('', [TransactionAPIController::class, 'get']);
        Route::get('/{id}', [TransactionAPIController::class, 'find']);
        Route::post('', [TransactionAPIController::class, 'create']);
        Route::put('/{id}', [TransactionAPIController::class, 'update']);
        Route::delete('/{id}', [TransactionAPIController::class, 'delete']);
    });

    Route::group([
        'prefix' => '/businessCategories'
    ], function () {
        Route::get('', [BusinessCategoryAPIController::class, 'get']);
    });

    Route::group([
        'prefix' => '/transactionItems'
    ], function () {
        Route::get('', [TransactionItemAPIController::class, 'get']);
    });

    Route::group([
        'prefix' => '/transactionTypes'
    ], function () {
        Route::get('', [TransactionTypeAPIController::class, 'get']);
    });
});
