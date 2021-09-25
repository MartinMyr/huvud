<?php

use App\Http\Controllers\MedicinController;
use App\Http\Controllers\MigraineLogController;
use App\Http\Controllers\UserController;
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

//MigraineLog Controller
Route::get('/logs/{userId}', [MigraineLogController::class, 'getAllForCurrentUser']);
Route::post('/log/register', [MigraineLogController::class, 'create']);

//Medicin Controller
Route::get('/medicins', [MedicinController::class, 'getAllForCurrentUser']);
Route::post('/medicin/create', [MedicinController::class, 'create']);

//User Controller
Route::post('/user/update', [UserController::class, 'update']);
