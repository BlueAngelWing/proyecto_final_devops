<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// Public Routes

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes
Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/session', [AuthController::class, 'checkIfExpired']);

    //Image Routes
    Route::get('/image', [ImageController::class, 'index']);
    Route::get('/image/{id}', [ImageController::class, 'show']);
    Route::post('/image', [ImageController::class, 'store']);
    Route::put('/image/{id}', [ImageController::class, 'update']);
    Route::delete('/image', [ImageController::class, 'destroy']);
    
    //Video Routes
    Route::get('/video', [VideoController::class, 'index']);
    Route::get('/video/{id}', [VideoController::class, 'show']);
    Route::post('/video', [VideoController::class, 'store']);
    Route::put('/video/{id}', [VideoController::class, 'update']);
    Route::delete('/video', [VideoController::class, 'destroy']);

});
