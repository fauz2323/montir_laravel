<?php

use App\Http\Controllers\controllerMontir;
use App\Http\Controllers\controllerPelanggan;
use App\Http\Controllers\controllerSparepart;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\controllerProfile;
use App\Http\Controllers\DataPembayaranController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DataUserController;
use App\Http\Controllers\User\MotorUserController;
use App\Http\Controllers\User\OrderUserController;
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
})->name('index-page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data-user', function () {
    return 'ini adalah data user';
})->middleware('auth', 'role:user|admin');

Route::get('/data-admin', function () {
    return 'ini adalah data admin';
})->middleware('auth', 'role:admin');

Route::middleware('auth')->group(function () {

    Route::get('/adm', [HomeController::class, 'index']);


    //MONTIR
    // Route::get('/admin', [MontirController::class, 'admin.montir.index']);
    // Route::get('/montir', [controllerMontir::class, 'index'])->name('montir.index');
    // route::get('/create', [controllerMontir::class, 'create'])->name('admin.montir.create');
    // route::post('/store', [controllerMontir::class, 'store']);
    // Route::get('/{id}/edit', [controllerMontir::class, 'edit'])->name('admin.montir.edit');
    // Route::put('/{id}', [controllerMontir::class, 'update'])->name('admin.montir.update');
    // Route::get('/{id}/detail', [controllerMontir::class, 'detail'])->name('admin.montir.detail');
    // Route::delete('/{id}/destroy', [controllerMontir::class, 'destroy'])->name('montir.destroy');
    Route::resource('montir', ControllerMontir::class);
    Route::get('/montir-pdf', [ControllerMontir::class, 'montirPDF']);
    Route::get('/montir-excel', [ControllerMontir::class, 'montirExcel']);

    //Motor
    Route::resource('motor', MotorController::class);

    //Pelanggan
    Route::resource('pelanggan', ControllerPelanggan::class);
    //Route::get('/pelanggan', [controllerPelanggan::class, 'pelanggan'])->name('pelanggan.pelanggan');
    Route::get('/pelanggan-pdf', [ControllerPelanggan::class, 'pelangganPDF']);
    Route::get('/pelanggan-excel', [ControllerPelanggan::class, 'pelangganExcel']);

    //PROFILE
    Route::get('/profile', [controllerProfile::class, 'profile'])->name('admin.profile.profile');
    // Route::get('/profile-pdf', [ControllerPelanggan::class, 'profilePDF']);

    //Sparepart
    Route::resource('sparepart', controllerSparepart::class);
    // Route::get('/sparepart', [controllerSparepart::class, 'index'])->name('sparepart.index');
    // route::get('/create', [controllerSparepart::class, 'create'])->name('admin.sparepart.create');
    // route::post('/store', [controllerSparepart::class, 'store'])->name('admin.sparepart.store');
    // Route::get('/{id}/edit', [controllerSparepart::class, 'edit'])->name('admin.sparepart.edit');
    // Route::put('/{id}', [controllerSparepart::class, 'update'])->name('admin.sparepart.update');
    // Route::get('/{id}/detail', [controllerSparepart::class, 'detail'])->name('admin.sparepart.detail');
    // Route::delete('/{id}/destroy', [controllerSparepart::class, 'destroy'])->name('admin.sparepart.destroy');
    Route::get('/sparepart-pdf', [ControllerSparepart::class, 'sparepartPDF']);
    Route::get('/sparepart-excel', [ControllerSparepart::class, 'sparepartExcel']);

    //Supplier
    Route::resource('supplier', SupplierController::class);

    //service
    Route::resource('service', ServiceController::class);

    //Detail Service
    Route::resource('detailservice', DetailServiceController::class);
    Route::get('confirm/{id}/service', [DetailServiceController::class, 'confirm'])->name('confirm_service');

    //data Pembayaran
    Route::get('data-pembayaran', [DataPembayaranController::class, 'index'])->name('index-pembayaran');

    //user
    ///data pelanggan
    Route::get('data-pelanggan', [DataUserController::class, 'dataPelanggan'])->name('index-pelanggan');
    Route::get('delete/{id}/pelanggan', [DataUserController::class, 'deleteDataPelanggan'])->name('delete-pelanggan');
    Route::post('add-pelanggan', [DataUserController::class, 'addDataPelanggan'])->name('add-pelanggan');

    ///data motor
    Route::get('data-motor', [MotorUserController::class, 'dataMotor'])->name('index-motor');
    Route::get('delete/{id}/motor', [MotorUserController::class, 'deleteDataMotor'])->name('delete-motor');
    Route::post('add-motor', [MotorUserController::class, 'addDataMotor'])->name('add-motor');

    //order
    Route::get('service-list', [OrderUserController::class, 'orderList'])->name('index-service');
    Route::post('make-service', [OrderUserController::class, 'addOrder'])->name('make-service');
});
