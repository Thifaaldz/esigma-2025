<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSim extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_sims';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'jenis_sim',
        'lokasi_ujian',
        'ktp_path',
        'foto_path',
    ];
}
