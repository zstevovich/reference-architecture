<?php

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
Route::prefix('developer')->group(function () {
    Route::post('create', [App\Http\Controllers\Api\DeveloperController::class, 'addNewDeveloper'])->name('developer.create');
    Route::put('update', [App\Http\Controllers\Api\DeveloperController::class, 'updateDeveloper'])->name('developer.update');
    Route::get('get/{developerId}', [App\Http\Controllers\Api\DeveloperController::class, 'getDeveloper'])->name('developer.get');
    Route::get('all', [App\Http\Controllers\Api\DeveloperController::class, 'getAll'])->name('developer.all');
    Route::delete('delete/{developerId}', [App\Http\Controllers\Api\DeveloperController::class, 'deleteDeveloper'])->name('developer.delete');
});
