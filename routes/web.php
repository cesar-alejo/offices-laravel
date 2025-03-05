<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HeadquarterController;
use App\Http\Controllers\AdministrativeUnitController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('headq', [HeadquarterController::class, 'index'])->name('headq.index');
    Route::get('headq/create', [HeadquarterController::class, 'create'])->name('headq.create');
    Route::post('headq', [HeadquarterController::class, 'store'])->name('headq.store');
    Route::get('headq/{id}', [HeadquarterController::class, 'show'])->name('headq.show');
    Route::get('headq/{id}/edit', [HeadquarterController::class, 'edit'])->name('headq.edit');
    Route::put('headq/{id}', [HeadquarterController::class, 'update'])->name('headq.update');
    Route::delete('headq/{id}', [HeadquarterController::class, 'destroy'])->name('headq.destroy');

    Route::get('unit', [AdministrativeUnitController::class, 'index'])->name('unit.index');
    Route::get('unit/create', [AdministrativeUnitController::class, 'create'])->name('unit.create');
    Route::post('unit', [AdministrativeUnitController::class, 'store'])->name('unit.store');
    Route::get('unit/{id}', [AdministrativeUnitController::class, 'show'])->name('unit.show');
    Route::get('unit/{id}/edit', [AdministrativeUnitController::class, 'edit'])->name('unit.edit');
    Route::put('unit/{id}', [AdministrativeUnitController::class, 'update'])->name('unit.update');
    Route::delete('unit/{id}', [AdministrativeUnitController::class, 'destroy'])->name('unit.destroy');

    Route::get('office', [OfficeController::class, 'index'])->name('office.index');
    Route::get('office/create', [OfficeController::class, 'create'])->name('office.create');
    Route::post('office', [OfficeController::class, 'store'])->name('office.store');
    Route::get('office/{id}', [OfficeController::class, 'show'])->name('office.show');
    Route::get('office/{id}/edit', [OfficeController::class, 'edit'])->name('office.edit');
    Route::put('office/{id}', [OfficeController::class, 'update'])->name('office.update');
    Route::delete('office/{id}', [OfficeController::class, 'destroy'])->name('office.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
