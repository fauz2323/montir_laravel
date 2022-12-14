<?php

use App\Http\Controllers\Admin\controllerMontir;
use App\Http\Controllers\Admin\controllerMotor;
use App\Http\Controllers\Admin\controllerPelanggan;
use App\Http\Controllers\Admin\controllerProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('guests.index');
// });
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data-user', function () {
    return 'ini adalah data user';
})->middleware('auth', 'role:user|admin');

Route::get('/data-admin', function () {
    return 'ini adalah data admin';
})->middleware('auth', 'role:admin');


//route untuk admin
Route::middleware('role:admin', 'auth')->group(function () {
    //MONTIR
    // Route::get('/admin', [MontirController::class, 'admin.montir.index']);
    Route::get('/montir', [controllerMontir::class, 'index'])->name('montir.index');
    route::get('/create-montir', [controllerMontir::class, 'create'])->name('admin.montir.create');
    route::post('/store', [controllerMontir::class, 'store']);
    Route::get('/{id}/edit', [controllerMontir::class, 'edit'])->name('admin.montir.edit');
    Route::put('/{id}', [controllerMontir::class, 'update'])->name('admin.montir.update');
    Route::get('/{id}/detail', [controllerMontir::class, 'detail'])->name('admin.montir.detail');
    Route::delete('/{id}/destroy', [controllerMontir::class, 'destroy'])->name('montir.destroy');
    Route::get('/montir-pdf', [ControllerMontir::class, 'montirPDF']);
    Route::get('/montir-excel', [ControllerMontir::class, 'montirExcel']);

    //Pelanggan
    Route::get('/pelanggan', [controllerPelanggan::class, 'pelanggan'])->name('pelanggan.pelanggan');
    Route::get('/create-pelanggan', [controllerPelanggan::class, 'create'])->name('admin.pelanggan.create');
    Route::post('/store-pelanggan', [controllerPelanggan::class, 'store']);
    Route::get('/pelanggan-pdf', [ControllerPelanggan::class, 'pelangganPDF']);
    Route::get('/pelanggan-excel', [ControllerPelanggan::class, 'pelangganExcel']);

    //Motor
    Route::resource('motor-admin', controllerMotor::class);


    //PROFILE
    Route::get('/profile', [controllerProfile::class, 'profile'])->name('admin.profile.profile');
    // Route::get('/profile-pdf', [ControllerPelanggan::class, 'profilePDF']);
});


//route untuk user
Route::middleware('role:user', 'auth')->group(function () {

    // Route::get('/home', function () {
    //     return view('admin.master');
    // });



});
