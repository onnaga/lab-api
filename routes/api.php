<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\StorageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

// Route::get('show/all',[MedicineController::class,'show_all'])->name('show_all');
// Route::get('show/all/{id}',[MedicineController::class,'destroy'])->name('delete');
// Route::get('show/orders',[MedicineController::class,"show_all_orders"])->name('all_orders');
// Route::get('show/orders/{id}',[StorageController::class,"change_payed"])->name('change_payed');
// Route::get('shwo/orders/{id}',[StorageController::class,"change_status"])->name('change_status');


Route::get('home',[StorageController::class,"home"])->name('home');
Route::get('show/orders',[StorageController::class,"show_your_orders"])->name('all_orders');
Route::post('home/addOrder',[StorageController::class,"storeOrder"])->name('add_order');
Route::post('search/byname',[MedicineController::class,'show'])->name('name_srch');
Route::post('search/bytype',[MedicineController::class,'show_type'])->name('type_srch');
Route::post('add',[MedicineController::class,'store'])->name('add_new');
