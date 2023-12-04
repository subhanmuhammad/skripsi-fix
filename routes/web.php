<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\tbl_testingController;
use App\Http\Controllers\tbl_trainingController;

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

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [loginController::class, 'login'])->name('login');
    Route::post('/post_login', [loginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/uji', [DashboardController::class, 'uji_data']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/akurasi', [DashboardController::class, 'akurasi']);
    // Route::get('/data-testing', [DashboardController::class, 'datatesting'])->name('data-testing');
    Route::post('/importexcel', [DashboardController::class, 'importexcel'])->name('import_excel');
    Route::get('/t-testing', [DashboardController::class, 'Tdatatesting'])->name('/tambah-data-testing');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
    Route::get('/pengujian', [DashboardController::class, 'uji'])->name('uji');
    Route::get('/print', [DashboardController::class, 'print'])->name('print');
    // Route::delete('/hapus_pengujian/{id}', [DashboardController::class, 'hapus_pengujian'])->name('hapus_pengujian');

    //INI ROUTE DATA TESTING
    Route::get('/data-testing', [tbl_testingController::class, 'datatesting'])->name('data-testing');

    Route::post('/insert-data-testing', [tbl_testingController::class, 'insert_data_testing'])->name('insert-data-testing');
    Route::delete('/hapus/{id}', [tbl_testingController::class, 'delete'])->name('delete');
    Route::post('/tambah_data', [tbl_testingController::class, 'tambah_data'])->name('tambah_data');
    Route::get('/edit_data_testing/{id}', [tbl_testingController::class, 'edit_data_testing'])->name('/edit_data_testing');
    Route::put('/update/data_testing/{id}', [tbl_testingController::class, 'update_data_testing'])->name('/update/data_testing');
    Route::get('/klasifikasi/{id}', [tbl_testingController::class, 'klasifikasi'])->name('klasifikasi');
    Route::post('/import_excel_test', [tbl_testingController::class, 'import_excel'])->name('import_excel_test');

    // INI ROUTE DATA TRAINING
    Route::get('/data-training', [tbl_trainingController::class, 'datatraining'])->name('data-training');
    Route::get('/tambah-data-training', [tbl_trainingController::class, 'tambah_data_training']);
    Route::post('/insert-data-training', [tbl_trainingController::class, 'insert_data_training']);
    Route::get('/edit_data_training/{id}', [tbl_trainingController::class, 'edit_data_training']);
    Route::put('/update/data_training/{id}', [tbl_trainingController::class, 'update_data_training']);
    Route::delete('/delete_data_training/{id}', [tbl_trainingController::class, 'delete_data_training'])->name('delete');

    //ROUTE IMPORT EXCEL
    Route::post('/impot-excel', [tbl_trainingController::class, 'import_excel'])->name('import_excel');
    Route::get('/filter_hasil_klasifikasi', [DashboardController::class, 'filter_hasil_klasifikasi'])->name('filter_hasil_klasifikasi');
});
