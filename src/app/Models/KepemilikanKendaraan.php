<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepemilikanKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nopol',
        'no_rangka',
        'no_mesin',
        'masyarakat_id',
        'kendaraan_id',
    ];



    public function kendaraan()
    {
        return $this->belongsTo(\App\Models\Kendaraan::class);
    }
    
    public function masyarakat()
    {
        return $this->belongsTo(\App\Models\Masyarakat::class);
    }
}
