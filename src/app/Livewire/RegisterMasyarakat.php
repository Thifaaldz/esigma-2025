<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RegisterMasyarakat extends Component
{
    public $nik;
    public $nama;
    public $email;
    public $telepon;
    public $password;
    public $password_confirmation;
    public $agree = false;

    protected $rules = [
        'nik'       => 'required|unique:masyarakats,nik',
        'nama'      => 'required|string',
        'email'     => 'required|email|unique:masyarakats,email|unique:users,email',
        'telepon'   => 'required',
        'password'  => 'required|min:6|confirmed',
        'agree'     => 'accepted',
    ];

    public function submit()
    {
        $this->validate();

        // 1. Buat akun User
        $user = User::create([
            'name'     => $this->nama,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // 2. Berikan role "masyarakat"
        $user->assignRole('masyarakat');

        // 3. Simpan data ke tabel Masyarakat
        Masyarakat::create([
            'user_id'  => $user->id,
            'nik'      => $this->nik,
            'nama'     => $this->nama,
            'email'    => $this->email,
            'telepon'  => $this->telepon,
        ]);     

        // 4. Login user
        auth()->login($user);

        // 5. Redirect ke dashboard
        return redirect()->route('filament.masyarakat.pages.dashboard');
    }

    public function render()
    {
        return view('livewire.register-masyarakat')
            ->layout('layouts.app', ['title' => 'Registrasi Masyarakat']);
    }
}
