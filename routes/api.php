<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;

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

Route::get('/', [PendudukController::class, 'createToken']);
Route::get('/ktp', [PendudukController::class, 'index']);
Route::post('/ktp/store', [PendudukController::class, 'store']);
Route::get('/ktp/{id}', [PendudukController::class, 'show']);
Route::patch('/ktp/{id}/update', [PendudukController::class, 'update']);
Route::delete('/ktp/{id}/delete', [PendudukController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
