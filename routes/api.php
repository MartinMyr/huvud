<?php

use App\Http\Controllers\MedicinController;
use App\Http\Controllers\MigraineLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/logs/{userId}', [MigraineLogController::class, 'getAllForCurrentUser']);
Route::post('/log/register', [MigraineLogController::class, 'create']);

Route::get('/medicins', [MedicinController::class, 'getAllForCurrentUser']);
Route::post('/medicin/create', [MedicinController::class, 'create']);
