<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nopol', 'no_rangka', 'no_mesin', 'jenis_roda', 'merek', 'tipe', 'tahun_pembuatan'
    ];
    public function masyarakat()
{
    return $this->belongsTo(Masyarakat::class);
}

public function tilangs()
{
    return $this->hasMany(Tilang::class);
}



public function kepemilikanKendaraan()
{
    return $this->hasOne(KepemilikanKendaraan::class);
}

// Relasi ke User (pemilik awal)
public function user()
{
    return $this->belongsTo(User::class);
}

}
