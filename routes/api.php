<?php

use App\Http\Controllers\Api\KinerjaPegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('kinerja', [KinerjaPegawaiController::class, 'index']);
// Route::get('kinerja/{id}', [KinerjaPegawaiController::class, 'show']);
// Route::post('kinerja', [KinerjaPegawaiController::class, 'store']);
// Route::put('kinerja/{id}', [KinerjaPegawaiController::class, 'update']);
// Route::delete('kinerja/{id}', [KinerjaPegawaiController::class, 'destroy']);

Route::apiResource('kinerja', KinerjaPegawaiController::class);