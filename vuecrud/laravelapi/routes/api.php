<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::get('mahasiswa/{edit}', [MahasiswaController::class, 'edit']);
Route::put('mahasiswa/{edit}', [MahasiswaController::class, 'update']);
Route::delete('mahasiswa/{delete}', [MahasiswaController::class, 'destroy']);