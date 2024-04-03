<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('dash.index');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dash.index');
    Route::get('/pengajuan', [DashboardController::class, 'pengajuan'])->name('dash.pengajuan');
    Route::get('/pengajuan/{id}', [DashboardController::class, 'show'])->name('dash.show');
    Route::get('/word/{id}', [DashboardController::class, 'downloadWord'])->name('dash.download');
    Route::get('/generate', [DashboardController::class, 'generete'])->name('dash.generate');

});



Route::get('/pengajuan/{nip}/{nama}/{no_hp}', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::post('/pengajuan', [PengajuanController::class, 'post'])->name('pengajuan.post');

