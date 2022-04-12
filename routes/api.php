<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyAPI;

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

Route::get('data', [DummyAPI::class, 'index']);
Route::get('device-list/{num}', [DummyAPI::class, 'getApiDataFromDatabase']);
Route::get('device-list', [DummyAPI::class, 'getApiDataFromDatabase']);


Route::post('save-device', [DummyAPI::class, 'addDeviceFromPostAPI']);


Route::put('update-device', [DummyAPI::class, 'updateDevice']);

Route::delete('delete-device/{id}', [DummyAPI::class, 'deleteDevice']);

Route::get("search/{keyword}", [DummyAPI::class, 'search']);