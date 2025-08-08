<?php

use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;
use App\Livewire\Dashboard;
use App\Livewire\RowData;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth',
    ValidateSessionWithWorkOS::class,
])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('dashboard/data-abk', Dashboard\DataABK::class)->name('data-abk');
    Route::get('row-data', RowData\Index::class)->name('row-data');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/security.php';
