<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WarrantyplanController;
use App\Http\Controllers\PlanstartdateController;
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
    return view('welcome');
});

 
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//seraching Route
Route::view('searchplan','searchplanvalidity');
Route::post('searchplan', [PlanstartdateController::class, 'search']);
//end of seraching Route

//assign plan Route
Route::view('createplan','createplan')->middleware('is_admin');
Route::post('createplan', [PlanstartdateController::class, 'addplan'])->middleware('is_admin');
Route::get('list', [PlanstartdateController::class, 'showsplan'])->middleware('is_admin');
Route::get('deleteplan/{id}', [PlanstartdateController::class, 'deleteplan'])->middleware('is_admin');
Route::get('editplan/{id}', [PlanstartdateController::class, 'editPlan'])->middleware('is_admin');
Route::post('updateplan', [PlanstartdateController::class, 'updatePlan'])->middleware('is_admin');
//End Plan Route

//Warranty plan Route
Route::get('warrantylist', [WarrantyplanController::class, 'show']);
Route::get('editwarranty/{id}', [WarrantyplanController::class, 'editWarranty'])->middleware('is_admin');
Route::get('delete/{id}', [WarrantyplanController::class, 'delete'])->middleware('is_admin');
Route::post('update', [WarrantyplanController::class, 'updateWarranty'])->middleware('is_admin');
Route::view('createwarranty','createwarrantyplan');
Route::post('createwarranty', [WarrantyplanController::class, 'addwarranty']);
//end warranty plan Route