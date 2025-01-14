<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    // Se sobrescribe la ruta `dashboard` y `\`
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('backpack.dashboard');
    Route::get('/', [AdminController::class, 'redirect'])->name('backpack');

    Route::crud('file-pdf', 'FilePDFCrudController');
    Route::crud('generate-pdf', 'GeneratePDFCrudController');
    Route::crud('view-form', 'ViewFormCrudController');
    Route::get('charts/dashboard/count-versions', 'Charts\\Dashboard\\CountVersionsChartController@response')->name('charts.dashboard.count-versions.index');
    Route::get('charts/dashboard/count-generates', 'Charts\\Dashboard\\CountGeneratesChartController@response')->name('charts.dashboard.count-generates.index');
}); // this should be the absolute last line of this file
