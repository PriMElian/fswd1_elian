<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Http;
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
    return view('index');
});

Route::middleware('web')->group(function () {
    // Karyawan CRUD endpoints
    Route::get('/api/karyawan', [KaryawanController::class, 'index']);
    Route::post('/api/karyawan', [KaryawanController::class, 'store']);
    Route::get('/api/karyawan/{id}', [KaryawanController::class, 'show']);
    Route::put('/api/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::patch('/api/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/api/karyawan/{id}', [KaryawanController::class, 'destroy']);

    // Other specific endpoints
    Route::get('/api/first-joined-karyawan', [KaryawanController::class, 'firstJoinedEmployees']);
    Route::get('/api/karyawan-with-cuti', [KaryawanController::class, 'karyawanWithCuti']);
    Route::get('/api/remaining-cuti', [KaryawanController::class, 'remainingCuti']);
});


