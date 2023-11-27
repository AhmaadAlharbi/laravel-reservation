<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyUserController;
use App\Http\Controllers\CompanyGuideController;
use App\Http\Controllers\CompanyActivityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('companies', CompanyController::class)->middleware('isAdmin');
    Route::resource('companies.users', CompanyUserController::class)->except('show');
    Route::resource('companies.guides', CompanyGuideController::class)->except('show');
    Route::get('/excel', [ExcelController::class, 'index']);
    Route::get('/show-excel', [ExcelController::class, 'showExcel']);
    Route::get('/excel/{filename}', function ($filename) {
        $filename = basename($filename);

        $path = storage_path("app/public/{$filename}");

        if (!File::exists($path)) {
            abort(404);
        }

        $fileContents = file_get_contents($path);

        return response($fileContents, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    })->where('filename', '.*');
    Route::resource('companies.activities', CompanyActivityController::class);
});

require __DIR__ . '/auth.php';
