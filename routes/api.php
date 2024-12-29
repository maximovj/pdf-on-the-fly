<?php

use App\Http\Controllers\API\ViewFormController;
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

Route::group(['prefix' => 'v1/view-form'], function () {
    Route::get('/{id}/generate_pdf',[ViewFormController::class, 'generate_pdf']
    )->name('api.v1.view-form.generate_pdf');

    Route::post('/{id}/save_pdf',[ViewFormController::class, 'save_pdf'])
    ->name('api.v1.view-form.save_pdf');

    Route::post('/{id}/save_draft',[ViewFormController::class, 'save_draft'])
    ->name('api.v1.view-form.save_draft');
});
