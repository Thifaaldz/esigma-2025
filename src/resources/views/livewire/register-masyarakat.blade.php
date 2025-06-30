<div class="min-h-screen bg-sky-300 flex flex-col items-center pt-10">
    <div class="text-center mb-6">
        <img src="{{ asset('img/logo.png') }}" alt="Logo E-SIGMA" class="w-20 mx-auto">
        <h1 class="text-3xl font-bold">E-Sigma System Register</h1>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-4xl">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <input type="text" placeholder="Masukan NIK E-KTP Anda" wire:model="nik" class="w-full p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="off">
                    @error('nik') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="email" placeholder="Masukan Email (digunakan untuk login)" wire:model="email" class="w-full p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="text" placeholder="Masukan Nama Anda" wire:model="nama" class="w-full p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="off">
                    @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="text" placeholder="Masukan Nomer Telpon Anda" wire:model="telepon" class="w-full p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="off">
                    @error('telepon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="md:col-span-2">
                    <input type="password" id="passwordField" placeholder="Masukan Kata Sandi Anda" wire:model="password" class="w-full p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="new-password">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <button type="button" onclick="togglePassword()" class="text-sm mt-2 text-blue-600">Tampilkan Password</button>
                </div>
                <div class="md:col-span-2">
                    <input type="password" placeholder="Masukan Ulang Kata Sandi Anda" wire:model="password_confirmation" class="w-full p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="new-password">
                </div>
            </div>

            <div class="mt-6 flex items-start">
                <input type="checkbox" wire:model="agree" class="mt-1 mr-2" required>
                <p class="text-sm text-gray-600">
                    Saya Telah Menyetujui <a href="#" class="text-blue-600 font-semibold">Ketentuan</a> dan <a href="#" class="text-blue-600 font-semibold">Kebijakan Privasi</a>.
                </p>
            </div>
            @error('agree') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button type="submit" wire:loading.attr="disabled" class="w-full mt-6 bg-blue-700 text-white font-bold py-3 rounded-full hover:bg-blue-800 transition">
                <span wire:loading.remove>Registrasi</span>
                <span wire:loading>Memproses...</span>
            </button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const field = document.getElementById('passwordField');
        field.type = field.type === 'password' ? 'text' : 'password';
    }
</script>
    