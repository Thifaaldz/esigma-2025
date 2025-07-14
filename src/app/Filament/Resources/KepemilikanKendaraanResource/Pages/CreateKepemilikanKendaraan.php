<?php

namespace App\Filament\Resources\KepemilikanKendaraanResource\Pages;

use App\Filament\Resources\KepemilikanKendaraanResource;
use App\Models\Kendaraan;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateKepemilikanKendaraan extends CreateRecord
{
    protected static string $resource = KepemilikanKendaraanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $kendaraan = Kendaraan::find($data['kendaraan_id']);

    if ($kendaraan) {
        // Cek apakah kendaraan sudah dimiliki oleh masyarakat lain
        $sudahDimiliki = \App\Models\KepemilikanKendaraan::where('kendaraan_id', $kendaraan->id)->exists();

        if (! $sudahDimiliki) {
            // Isi data nopol, no_rangka, no_mesin dari kendaraan
            $data['nopol'] = $kendaraan->nopol;
            $data['no_rangka'] = $kendaraan->no_rangka;
            $data['no_mesin'] = $kendaraan->no_mesin;

            Notification::make()
                ->title('Kendaraan berhasil dikaitkan dengan akun Anda.')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Kendaraan ini sudah dimiliki masyarakat lain.')
                ->danger()
                ->send();
        }
    } else {
        Notification::make()
            ->title('Kendaraan tidak ditemukan.')
            ->danger()
            ->send();
    }

    return $data;
}

 
}
