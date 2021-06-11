<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.action');

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/test', function() {
        return 0;
    });
});;

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route khusus admin
Route::group(['prefix' => 'admin', 'middleware' => 'cek.admin'], function(){
	Route::redirect('/','/admin/dashboard');
	Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});