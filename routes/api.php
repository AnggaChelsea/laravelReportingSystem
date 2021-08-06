<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',  [AuthController::class, 'proses_loginApi']);

//register admin routes
Route::post('/adminregister', [AdminController::class, 'createadmin']);

Route::get('/paginateadmin', [OwnerController::class, 'paginateadmin']);

Route::get('/listadmin', [OwnerController::class, 'listadminapi']);
Route::get('/listadminapiid/{id}', [OwnerController::class, 'listadminapiid']);
Route::get('/paginateadmin', [OwnerController::class, 'paginateadmin']);
Route::post('/addadminapi', [OwnerController::class, 'addadminapi']);