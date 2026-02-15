<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Route;

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

    Route::resource('contacts', ContactController::class);

    Route::resource('deals', DealController::class)->middleware('auth');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    Route::get('/activities/create/{deal}', [ActivityController::class, 'create'])
        ->name('activities.create')
        ->middleware('auth');
    Route::post('/activities', [ActivityController::class, 'store'])
        ->name('activities.store')
        ->middleware('auth');
});

require __DIR__ . '/auth.php';
