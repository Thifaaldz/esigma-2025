<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tilang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id', 'petugas_id', 'jenis_pelanggaran',
        'deskripsi', 'tanggal_pelanggaran', 'lokasi', 'status'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}