<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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

//User plan Route
Route::get('admin/userlist', [UsersController::class, 'userlisting'])->name('admin.userlisting')->middleware('is_admin');
/*Route::get('editwarranty/{id}', [WarrantyplanController::class, 'editWarranty'])->middleware('is_admin');
Route::get('delete/{id}', [WarrantyplanController::class, 'delete'])->middleware('is_admin');
Route::post('update', [WarrantyplanController::class, 'updateWarranty'])->middleware('is_admin');
Route::view('createwarranty','createwarrantyplan');
Route::post('createwarranty', [WarrantyplanController::class, 'addwarranty']);*/
//end warranty plan Route