<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('admin.index');
});


//route of product
Route::post('product/create', [ProductController::class,'store'])->name('productStore');
Route::get('product', [ProductController::class,'index'])->name('product');
Route::get('product/create', [ProductController::class,'create'])->name('productCreate');
Route::get('product/edit/{id}', [ProductController::class,'edit'])->name('productEdit');
Route::post('product/update', [ProductController::class,'update'])->name('productUpdate');
Route::get('product/delete/{id}', [ProductController::class ,'destroy'])->name('productDelete');

//route of employee
Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('employee/create', [EmployeeController::class, 'create'])->name('employeeCreate');
Route::post('employee/create', [EmployeeController::class, 'store'])->name('employeeStore');
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employeeEdit');
Route::post('employee/update', [EmployeeController::class, 'update'])->name('employeeUpdate');
Route::get('employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employeeDelete');

//route of inventory

Route::get('inventory', [InventoryController::class, 'index'])->name('invventory');
Route::post('inventory', [InventoryController::class, 'store'])->name('inventoryStore');
Route::get('inventory/{id}', [InventoryController::class, 'detail'])->name('inventoryDetail');
Route::get('inventory/edit/{id}', [InventoryController::class, 'edit'])->name('inventoryEdit');
Route::get('inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventoryDelete');
Route::post('inventory/edit', [InventoryController::class, 'update'])->name('inventoryUpdate');

