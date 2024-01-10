<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('karyawan', KaryawanController::class);
    Route::get('first-joined-karyawan', 'KaryawanController@firstJoinedEmployees');
    Route::get('karyawan-with-cuti', 'KaryawanController@karyawanWithCuti');
    Route::get('remaining-cuti', 'KaryawanController@remainingCuti');
});
