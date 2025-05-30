<?php

use App\Http\Controllers\Api\AttendanceApiController;
use App\Http\Controllers\Api\RFIDController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/rfid', [RFIDController::class, 'store']);
Route::get('/kartu', [RFIDController::class, 'index']); //cek error

Route::get('/scan', [AttendanceApiController::class, 'handleScan']);