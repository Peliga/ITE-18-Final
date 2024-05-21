<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Get Method using API
Route::get('/product/data/name/{name?}',[ProductController::class,'getName']);
Route::get('/product/data/id/{id?}',[ProductController::class,'getId']);

// POST method using APIc
// use post to send data to the database
Route::post('add',[ProductController::class,'add']);
//use put to update data from the database
Route::put('update',[ProductController::class,'update']);
Route::get('search/{name}',[ProductController::class,'search']);
Route::delete('delete/{id}',[ProductController::class,'delete']);
Route::post('validate',[ProductController::class,'validateProduct']);

Route::get('view/students',[StudentController::class,'view']);
Route::get('view/course',[CourseController::class,'viewCourse']);

Route::get('view/student/{name}',[StudentController::class, 'viewStudent']);

//login and register route
Route::post('login',[StudentController::class,'login'])->name("login");
Route::post('logout',[StudentController::class,'logout'])->name("logout");

Route::post('register',[StudentController::class,'register'])->name("register");





