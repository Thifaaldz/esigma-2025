<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tilang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">

    <div class="p-6 max-w-xl mx-auto bg-white rounded-xl shadow-md space-y-4 mt-10">
        <h2 class="text-2xl font-bold text-center text-blue-600">Cek Tilang Berdasarkan Plat Nomor</h2>

        {{-- Form Input --}}
        <form wire:submit.prevent="cek" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Plat Nomor Kendaraan</label>
                <input type="text" wire:model="plat_nomor" placeholder="Contoh: B 1234 XYZ"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            @error('plat_nomor')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            </div>

            <button type="submit"
                class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Cari Data Tilang
            </button>
        </form>

        {{-- Pesan Error --}}
        @if (session()->has('error'))
            <div class="text-red-600 mt-2">
                {{ session('error') }}
            </div>
        @endif

        {{-- Hasil Pencarian --}}
        @if ($dataTilang && count($dataTilang) > 0)
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-2">Hasil Tilang:</h3>
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Tanggal</th>
                            <th class="border p-2">Pelanggaran</th>
                            <th class="border p-2">Lokasi</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTilang as $tilang)
                            <tr>
                                <td class="border p-2">{{ \Carbon\Carbon::parse($tilang->tanggal_pelanggaran)->format('d-m-Y') }}</td>
                                <td class="border p-2">{{ $tilang->jenis_pelanggaran }}</td>
                                <td class="border p-2">{{ $tilang->lokasi }}</td>
                                <td class="border p-2">
                                    @if($tilang->status == 'Belum Diverifikasi')
                                        <span class="text-yellow-600">{{ $tilang->status }}</span>
                                    @elseif($tilang->status == 'Ter
