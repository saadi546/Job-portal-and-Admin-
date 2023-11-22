<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/joblisting', [JobController::class, 'index'] )->name('jobs.index');

Route::get('/jobs/filter', [JobController::class, 'filter'])->name('jobs.filter');

Route::get('/jobdetails/{id?}', [JobController::class, 'show'] )->name('jobs.detail');

Route::get('/jobdetails', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/jobdetails', [ApplicationController::class, 'store'])->name('applications.store');




Route::middleware('auth')->group(function(){

     Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

     Route::get('/adminpostjob', [App\Http\Controllers\AdminController::class, 'create'])->name('jobs.create');

     Route::post('/adminpostjob', [App\Http\Controllers\AdminController::class, 'store'])->name('jobs.post');


     Route::get('/adminjoblisting', [App\Http\Controllers\AdminController::class, 'views'])->name('jobs.admin.listing');

     Route::delete('/adminjoblisting/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('joblistings.destroy');


     Route::post('/adminjoblisting-post', [App\Http\Controllers\AdminController::class, 'views'])->name('jobs.admin.listing.post');

     Route::get('/adminapplication', [ApplicationController::class, 'index'])->name('admin.application');

     Route::get('/adminapplication-download/{url}', [ApplicationController::class, 'download'])->name('download.cv');


});