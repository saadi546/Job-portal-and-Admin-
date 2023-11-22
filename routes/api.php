<?php

use App\Http\Controllers\Api\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function(){
    Route::post('login','login');
    Route::post('register','register');
});

Route::controller(JobController::class)->group(function(){
    Route::get('/jobsdetails', [JobController::class, 'index']);
    Route::get('/jobsdetails/{id?}', [JobController::class, 'jobdetails'] );
    Route::post('form',[FormController::class,'form']);
    Route::post('store',[JobController::class,'store']);
    
});