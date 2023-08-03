<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
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


Route::post('create-token', [AdminController::class, 'createToken']);


Route::middleware('auth:sanctum')->group(function () {
    Route::put('change-role', [AdminController::class, 'changeUserRole']);

    Route::prefix('notification')->group(function () {
        Route::post('create', [NotificationController::class, 'createNotification']);
        Route::get('read-update/{notification}', [NotificationController::class, 'readUpdateNotification']);
        Route::get('read', [NotificationController::class, 'readNotifications']);
        Route::post('update/{notification}', [NotificationController::class, 'updateNotification']);
        Route::delete('delete/{notification}', [NotificationController::class, 'deleteNotification']);
    });

});
