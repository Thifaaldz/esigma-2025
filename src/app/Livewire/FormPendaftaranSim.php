<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PendaftaranSim;

class FormPendaftaranSim extends Component
{
    use WithFileUploads;

    public $nama_lengkap, $nik, $tanggal_lahir, $alamat, $jenis_kelamin, $jenis_sim, $lokasi_ujian;
    public $ktp, $foto;

    public $success = false;
    public $pendaftaranId = null;

    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'required|digits:16|unique:pendaftaran_sims,nik',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'jenis_sim' => 'required|in:SIM A,SIM B,SIM C',
        'lokasi_ujian' => 'required|string',
        'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        // Validasi rasio 4:3 untuk foto

        // Simpan file ke storage/public
        $ktpPath = $this->ktp->store('ktp', 'public');
        $fotoPath = $this->foto->store('foto', 'public');

        // Simpan data ke database
        $pendaftaran = PendaftaranSim::create([
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'jenis_kelamin' => $this->jenis_kelamin,
            'jenis_sim' => $this->jenis_sim,
            'lokasi_ujian' => $this->lokasi_ujian,
            'ktp_path' => $ktpPath,
            'foto_path' => $fotoPath,
        ]);

        // Tampilkan pesan sukses dan tombol cetak
        $this->success = true;
        $this->pendaftaranId = $pendaftaran->id;

        // Reset form input kecuali sukses dan pendaftaranId
        $this->reset([
            'nama_lengkap', 'nik', 'tanggal_lahir', 'alamat',
            'jenis_kelamin', 'jenis_sim', 'lokasi_ujian', 'ktp', 'foto'
        ]);
    }

    public function render()
    {
        return view('livewire.form-pendaftaran-sim');
    }
}
