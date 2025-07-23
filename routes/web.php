<?php

use App\Livewire\Welcome;
use App\Livewire\AdminLayout;
use App\Livewire\V1\Auth\Login;
use App\Livewire\V1\SalesList;
use Illuminate\Support\Facades\Route;

//Route::get('/', Welcome::class);
Route::get('/admin', AdminLayout::class);

// Login Routes
Route::get('/login', Login::class)->name('login')->middleware(['guest']);

//Route for logout

//Route for logout action
Route::get('/logout', function () {

    auth()->logout();

    request()->session()->invalidate();

    return redirect('/login');
});

// Dashboard Route
//Route::get('/', Welcome::class)->name('welcome');
Route::middleware('auth')->group(function ()  {
    Route::get('/dashboard', Welcome::class);
    Route::get('/sales', SalesList::class);
    Route::get('/dashboard', Welcome::class);
    Route::get('/dashboard', Welcome::class);
});
