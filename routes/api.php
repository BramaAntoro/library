<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->middleware('AlreadyLoggedIn');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::middleware('role:admin')->group(function () {

        Route::post('/member', [MemberController::class, 'store']);
        Route::get('/members', [MemberController::class, 'index']);
        Route::delete('/member/{id}', [MemberController::class, 'destroy']);
        Route::put('/member/{id}', [MemberController::class, 'update']);

        // Route::post('/author');

    });

});