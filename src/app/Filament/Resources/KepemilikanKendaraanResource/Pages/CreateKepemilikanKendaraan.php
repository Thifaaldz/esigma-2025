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
        $kendaraan = Kendaraan::where('nopol', $data['nopol'])
            ->where('no_rangka', $data['no_rangka'])
            ->where('no_mesin', $data['no_mesin'])
            ->first();

        if ($kendaraan) {
            if ($kendaraan->masyarakat_id === null) {
                $kendaraan->masyarakat_id = $data['masyarakat_id'];
                $kendaraan->save();

                $data['kendaraan_id'] = $kendaraan->id;

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
                ->title('Kendaraan tidak ditemukan. Periksa kembali data.')
                ->danger()
                ->send();
        }

        return $data;
    }
}
