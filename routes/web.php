<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NasabahController as AdminNasabahController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\SettingNasabahController;
use App\Http\Controllers\IdentitasNasabahController;
use App\Http\Controllers\TambahSaldoController;
use App\Http\Controllers\transferController;

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
// Route khusus nasabah
Route::group(['prefix' => 'nasabah', 'middleware' => 'auth'], function(){
	Route::get('setting', [SettingNasabahController::class, 'index'])->name('setting');
	Route::get('identitasNasabah', [IdentitasNasabahController::class, 'index'])->name('identitasNasabah');
	Route::prefix('saldo')->group(function(){
		Route::get('topup', [TambahSaldoController::class, 'index'])->name('tambahSaldo');
		Route::get('transfer', [transferController::class, 'index'])->name('transfer');
		Route::get('riwayat', [TambahSaldoController::class, 'history'])->name('riwayatSaldo');
	});
	Route::get('home', [HomeController::class, 'index'])->name('home');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});


// Route khusus admin
Route::group(['prefix' => 'admin', 'middleware' => 'cek.admin'], function(){
	Route::redirect('/','/admin/dashboard');
	Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

	Route::get('/settings', [AdminSettingController::class, 'index'])->name('admin.settings');
	Route::post('/settings', [AdminSettingController::class, 'update']);

	Route::get('/nasabah', [AdminNasabahController::class, 'index'])->name('admin.nasabah');
	Route::get('/nasabah/create', [AdminNasabahController::class, 'create'])->name('admin.nasabah.create');
	Route::post('/nasabah/create', [AdminNasabahController::class, 'store'])->name('admin.nasabah.create');
	Route::get('/nasabah/search', [AdminNasabahController::class, 'search'])->name('admin.nasabah.search');
	Route::post('/nasabah/delete', [AdminNasabahController::class, 'delete'])->name('admin.nasabah.delete');
	Route::get('/nasabah/{id}/edit', [AdminNasabahController::class, 'edit']);
	Route::post('/nasabah/{id}/edit', [AdminNasabahController::class, 'update']);
});
