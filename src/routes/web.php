<?php

use App\Http\Controllers\PendaftaranSimController;
use App\Livewire\FormPendaftaranSim;
use App\Livewire\HomePage;
use App\Livewire\RegisterMasyarakat;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', HomePage::class)->name('home');
Route::get('/pendaftaran-sim', function () {
    return view('pendaftaransim');
});
Route::get('/register', function () {
    return view('register'); // Mengarah ke resources/views/register.blade.php
})->name('register.masyarakat');


Route::get('/cetak-sim/{id}', [PendaftaranSimController::class, 'cetak'])->name('cetak.sim');