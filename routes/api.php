<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthContoller;
use App\Http\Controllers\Api\ProductController;

Route::post('login',[AuthContoller::class,'login']);
Route::post('register',[AuthContoller::class,'register']);
Route::prefix('admin')->middleware('auth:api')->group(function(){
    Route::resource('getproduct',ProductController::class);
});