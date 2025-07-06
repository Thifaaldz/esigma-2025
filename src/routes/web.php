<?php

use App\Livewire\RegisterMasyarakat;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Models\PendaftaranSim;
use App\Models\Tilang;
use Barryvdh\DomPDF\Facade\Pdf;

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

// routes/web.php


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/pendaftaran-sim', function () {
    return view('pendaftaransim');
})->name('pendaftaran.sim');

Route::get('/cetak-sim/{id}', function ($id) {
    $data = PendaftaranSim::findOrFail($id);
    $pdf = Pdf::loadView('pdf.sim', compact('data'));
    return $pdf->download('bukti_pendaftaran_SIM_'.$data->nik.'.pdf');
})->name('cetak.sim');


Route::get('/cek-tilang', Tilang::class);