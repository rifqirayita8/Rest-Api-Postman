<?php

use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\PeminjamController;
use App\Http\Controllers\Api\PenerbitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('buku', [BukuController::class, 'index']);
Route::get('buku/{id}', [BukuController::class, 'show']);
Route::post('buku', [BukuController::class, 'store']);
Route::put('buku/{id}', [BukuController::class, 'update']);
Route::delete('buku/{id}', [BukuController::class, 'destroy']);

Route::get('peminjam', [PeminjamController::class, 'index']);
Route::get('peminjam/{id}', [PeminjamController::class, 'show']);
Route::post('peminjam', [PeminjamController::class, 'store']);
Route::put('peminjam/{id}', [PeminjamController::class, 'update']);
Route::delete('peminjam/{id}', [PeminjamController::class, 'destroy']);

Route::get('penerbit', [PenerbitController::class, 'index']);
Route::get('penerbit/{id}', [PenerbitController::class, 'show']);
Route::post('penerbit', [PenerbitController::class, 'store']);
Route::put('penerbit/{id}', [PenerbitController::class, 'update']);
Route::delete('penerbit/{id}', [PenerbitController::class, 'destroy']);
