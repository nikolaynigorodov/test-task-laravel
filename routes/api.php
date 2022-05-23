<?php

use App\Http\Controllers\Api\PositionApiController;
use App\Http\Controllers\Api\TokenApiController;
use App\Http\Controllers\Api\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/token', [TokenApiController::class, 'createToken']);

Route::apiResources([
    'users' => UserApiController::class,
    'positions' => PositionApiController::class,
]);
