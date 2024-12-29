<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IntershipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RapportController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth:admin', 'verified'])->name('dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('intership')->middleware(['auth:admin', 'verified'])->name('intership.')->group(function(){
   Route::get('/', [IntershipController::class, 'index'])->name('index'); 
   Route::get('/liste-statgiaire', [IntershipController::class, 'showIntershipList'])->name('list'); 
   Route::get('/show/{intership}', [IntershipController::class, 'show'])->name('show'); 
   Route::get('/accept-request/{intership}', [IntershipController::class, 'accepted'])->name('accepted'); 
   Route::get('/reject-request/{intership}', [IntershipController::class, 'refused'])->name('refused'); 
   Route::get('/achieved-request/{intership}', [IntershipController::class, 'achieved'])->name('achieved'); 
});

Route::prefix('rapport')->middleware(['auth:admin', 'verified'])->name('rapport.')->group(function(){
    Route::get('/', [RapportController::class, 'index'])->name('index'); 
    Route::get('/validated-rapport/{rapport}', [RapportController::class, 'validated'])->name('validated'); 
 });


 Route::prefix('admin')->middleware(['auth:admin', 'verified'])->name('admin.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index'); 
    Route::get('/creer-un-admin', [AdminController::class, 'create'])->name('create'); 
    Route::post('/creer-un-admin', [AdminController::class, 'store'])->name('store'); 
 });

Route::get('/base', function(){

});

require __DIR__.'/auth.php';
