<?php

use App\Http\Controllers\FallaController;
use App\Http\Controllers\SolicitudController;
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

Route::apiResource('/fallas', FallaController::class);


Route::apiResource('/solicitudes', SolicitudController::class)->parameters([
    'solicitudes' => 'solicitud'
]);

Route::get('/solicitudes/eco/{eco}', [SolicitudController::class, 'showByEco']);
