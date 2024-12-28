<?php

use App\Http\Controllers\IntershipController;
use App\Http\Controllers\ProfileController;
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
})->middleware(['auth:admin', "auth:user", 'verified'])->name('dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('intership')->middleware(['auth:admin', 'verified'])->name('intership.')->group(function(){
   Route::get('/index', [IntershipController::class, 'index'])->name('index'); 
   Route::get('/show/{intership}', [IntershipController::class, 'show'])->name('show'); 
   Route::get('/update-to-stagiaire/{intership}', [IntershipController::class, 'accepted'])->name('
   '); 
});

Route::get('/base', function(){

});

require __DIR__.'/auth.php';
