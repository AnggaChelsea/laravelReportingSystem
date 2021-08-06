<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;

Route::get('/iniabout', [OwnerController::class, 'iniabout']);




// Route::get('/', function(){
//     return view('pages/about');
// });

Route::post("save_user",[UserController::class,"save_user"]);




//authentication
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
////////////////////////////////

//bawah ini route bisa di buka sama keduanya
Route::get('/pemasukanpage', [PemasukanController::class, 'PemasukanView'])->name('pemasukanpage');
Route::get('/chartpemasukan', function () {
    return view('pages/chart/chartpemasukan');
})->name('chartpemasukan');
Route::get('/orderList', [OwnerController::class,'orderlist'])->name('orderList');
Route::get('/home', [AdminController::class, 'index'])->name('home');
////////////////////////////////////////////////////////////////

//middleware khusus page untuk owner dan admin
Route::group(['middleware' => 'owner'], function () {
    //jadi di dalam group owner ini, owner bisa masuk ke listadmin
    Route::get('/listadmin', [OwnerController::class, 'listadmin'])->name('listadmin');
    Route::post('/', [AuthController::class, 'logout'])->name('logout');
    Route::get('/addadmin', [OwnerController::class, 'add'])->name('addadmin');
    // Route::post('/postadmin', [OwnerController::class,'postadmin']);
    Route::post('/addadminweb', [OwnerController::class, 'addadminweb']);
    Route::get('/admin', [OwnerController::class, 'admin']);
});
Route::group(['middleware' => 'admin'], function () {
    //sedangkan di dalam admin, admin tidak ada get listamdmin karna admin tidak di ijinkan masuk ke page admin
    Route::post('/', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/orderlist/{id}', [PemasukanController::class, 'viewdetails']);
