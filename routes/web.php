<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\StorageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('show/all',[MedicineController::class,'show_all'])->name('show_all');
Route::get('show/all/{id}',[MedicineController::class,'destroy'])->name('delete');
Route::get('show/orders',[MedicineController::class,"show_all_orders"])->name('all_orders');
Route::get('show/orders/{id}',[StorageController::class,"change_payed"])->name('change_payed');
Route::get('shwo/orders/{id}',[StorageController::class,"change_status"])->name('change_status');


Route::post('add',[MedicineController::class,'store'])->name('add_new');
Route::post('search/byname',[MedicineController::class,'show'])->name('name_srch');
Route::post('search/bytype',[MedicineController::class,'show_type'])->name('type_srch');

