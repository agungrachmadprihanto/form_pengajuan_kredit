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


Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dash.index');
    
    // Pengajuan dan Detail
    Route::get('/pengajuan', [DashboardController::class, 'pengajuan'])->name('dash.pengajuan');
    Route::get('/pengajuan/{id}', [DashboardController::class, 'show'])->name('dash.show');
    
    // Download Word
    Route::get('/word/{id}', [DashboardController::class, 'downloadWord'])->name('dash.download');

    // Download Laporan Excel
    Route::get('/laporan', [DashboardController::class, 'laporan'])->name('dash.laporan');
    Route::get('/downloadExcel', [DashboardController::class, 'downloadReport'])->name('dash.download');
    
    // Generate LINK berdasarkan user
    Route::get('/generate', [DashboardController::class, 'generete'])->name('dash.generate');

});


// Pengajuan untuk nasabah
Route::get('/pengajuan/{nip}/{nama}/{no_hp}', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::post('/pengajuan', [PengajuanController::class, 'post'])->name('pengajuan.post');

