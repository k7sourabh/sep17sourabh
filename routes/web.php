<?php

use App\Http\Controllers\Dashboard;
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

//login route
Route::get('/',[Dashboard::class,'index'])->name('login');
Route::get('/logout',[Dashboard::class,'logout'])->name('logout');
Route::post('/login_check',[Dashboard::class,'Login'])->name('login_check');

Route::group(['middleware' => 'login_check'], function () {
    
    Route::get('/dashboard',[Dashboard::class,'Dashboard_view'])->name('dashboard');//Dashboard (Student List)
    Route::get('/Student-view',[Dashboard::class,'Student_view'])->name('Student-Add-view');//Student Create View
    Route::post('/Student-Add',[Dashboard::class,'Student_Add'])->name('Student-Add');//Student Create
    Route::get('/Delete-Student',[Dashboard::class,'Student_delete'])->name('Student-delete');//Student Delete

});
