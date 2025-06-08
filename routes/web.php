<?php

use App\Http\Controllers\EmailListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    Auth::loginUsingId(1); // Automatically log in user with ID 1
    return to_route('dashboard');
});


Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  
    Route::get('/email-list', [EmailListController::class, 'index'])->name('email-list.index'); 

    Route::get('/email-list/create', [EmailListController::class, 'create'])->name('email-list.create'); 
   Route::post('/email-list/create', [EmailListController::class, 'store'])->name('email-list.store');
   
   
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
