<?php

use App\Livewire\Welcome;
use App\Livewire\AdminLayout;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);
Route::get('/admin', AdminLayout::class);
