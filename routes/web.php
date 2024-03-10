<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\HomeController;
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
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('admin',[LoginController::class,'index'])->name('login');
Route::post('admin.login',[LoginController::class,'login'])->name('user.login');


Route::group(['prefix'=> 'admin','middleware'=>'auth'], function () {
Route::GET('dashboard',[dashboardController::class,'index'])->name('dashboard');
Route::resource('user',UserController::class);
Route::resource('page',PageController::class);
Route::post('ckeditor/upload', [PageController::class, 'upload'])->name('ckeditor.upload');


Route::resource('role',RoleController::class);
Route::resource('permission',PermissionController::class);
Route::get('logout',[LoginController::class,'logout'])->name('logout');


});
Route::get('/{url}',[HomeController::class,'page'])->name('page');
