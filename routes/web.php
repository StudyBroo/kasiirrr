<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\UserController;


// Login
Route::get('/', [AuthController::class, 'index']);
Route::post('/cek_login', [AuthController::class, 'cek_login']); 
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    
    //Crud Data User
    Route::get('/user', [AuthController::class, 'index']);
    Route::post('/user/store', [AuthController::class, 'store']); 
    Route::get('/user/update/{id}', [AuthController::class, 'update']);
    Route::get('/user/destory/{id}', [AuthController::class, 'destory']);
});

Route::group(['middleware' => ['auth', 'checkRole:admin,kasir']], function(){
    Route::get('/home', [AuthController::class, 'index']);

});