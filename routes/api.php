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


Route::post('create-token', [AdminController::class,'createToken']);

Route::post('change-role', [AdminController::class,'changeUserRole']);

Route::middleware('auth:sanctum')->prefix('notification')->group(function (){
    Route::post('create', [NotificationController::class,'createNotification']);
    Route::post('read', [NotificationController::class,'readNotification']);
    Route::post('update', [NotificationController::class,'updateNotification']);
    Route::post('delete', [NotificationController::class,'deleteNotification']);
});
