<div>
    @if ($success)
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            ✅ Pendaftaran berhasil disimpan.
        </div>

        <a href="{{ route('cetak.sim', ['id' => $pendaftaranId]) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Cetak Bukti PDF
        </a>
    @else
        <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label>Nama Lengkap</label><br>
                <input type="text" wire:model.defer="nama_lengkap" class="border p-2 w-full">
                @error('nama_lengkap') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>NIK</label><br>
                <input type="text" wire:model.defer="nik" maxlength="16" class="border p-2 w-full">
                @error('nik') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Tanggal Lahir</label><br>
                <input type="date" wire:model.defer="tanggal_lahir" class="border p-2 w-full">
                @error('tanggal_lahir') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Alamat</label><br>
                <textarea wire:model.defer="alamat" class="border p-2 w-full"></textarea>
                @error('alamat') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Jenis Kelamin</label><br>
                <select wire:model.defer="jenis_kelamin" class="border p-2 w-full">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Jenis SIM</label><br>
                <select wire:model.defer="jenis_sim" class="border p-2 w-full">
                    <option value="">-- Pilih Jenis SIM --</option>
                    <option value="SIM A">SIM A</option>
                    <option value="SIM B">SIM B</option>
                    <option value="SIM C">SIM C</option>
                </select>
                @error('jenis_sim') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Lokasi Ujian</label><br>
                <select wire:model.defer="lokasi_ujian" class="border p-2 w-full">
                    <option value="">-- Pilih Lokasi Ujian --</option>
                    <option value="Polres Jakarta">Polres Jakarta</option>
                    <option value="Polres Bandung">Polres Bandung</option>
                </select>
                @error('lokasi_ujian') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Upload KTP (pdf/jpg/jpeg/png max 2MB)</label><br>
                <input type="file" wire:model="ktp" accept=".pdf,.jpg,.jpeg,.png">
                @error('ktp') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Upload Foto (rasio 4:3, jpg/jpeg/png max 2MB)</label><br>
                <input type="file" wire:model="foto" accept=".jpg,.jpeg,.png">
                @error('foto') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Daftar
            </button>
        </form>
    @endif
</div>
