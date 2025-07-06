<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tilang;

class CekTilang extends Component
{
    public $plat_nomor;
    public $hasilTilang = [];

    public function cari()
    {
        $this->validate([
            'plat_nomor' => 'required|string',
        ]);

        $this->hasilTilang = Tilang::whereHas('kendaraan', function ($query) {
            $query->where('plat_nomor', $this->plat_nomor);
        })->with('kendaraan')->get();
    }

    public function render()
    {
        return view('livewire.cek-tilang');
    }
}
