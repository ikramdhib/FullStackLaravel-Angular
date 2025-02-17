<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group([

    'middleware' => ['jwt.auth','role:admin'],

], function ($router) {
    
  Route::post('add',[StudentController::class, 'addStudent']);
  Route::put('update',[StudentController::class, 'updateStudent']);
  Route::delete('delete',[StudentController::class, 'deleteStudent']);
  Route::get('getone',[StudentController::class, 'getStudent']);
  Route::get('getall',[StudentController::class, 'getAll']);

});
