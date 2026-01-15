<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function(){
    return response()->json('hello');
});

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show']);
Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update']);
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy']);