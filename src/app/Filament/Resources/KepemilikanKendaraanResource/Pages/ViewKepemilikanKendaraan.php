<?php

namespace App\Filament\Resources\KepemilikanKendaraanResource\Pages;

use App\Filament\Resources\KepemilikanKendaraanResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;

class ViewKepemilikanKendaraan extends ViewRecord
{
    protected static string $resource = KepemilikanKendaraanResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Data Kendaraan')
                ->schema([
                    Forms\Components\TextInput::make('kendaraan.nopol')
                        ->label('Nomor Polisi')
                        ->disabled(),

                    Forms\Components\TextInput::make('kendaraan.no_rangka')
                        ->label('Nomor Rangka')
                        ->disabled(),

                    Forms\Components\TextInput::make('kendaraan.no_mesin')
                        ->label('Nomor Mesin')
                        ->disabled(),

                    Forms\Components\TextInput::make('kendaraan.jenis_roda')
                        ->label('Jenis Roda')
                        ->disabled(),

                    Forms\Components\TextInput::make('kendaraan.merek')
                        ->label('Merek')
                        ->disabled(),

                    Forms\Components\TextInput::make('kendaraan.tipe')
                        ->label('Tipe')
                        ->disabled(),

                    Forms\Components\TextInput::make('kendaraan.tahun_pembuatan')
                        ->label('Tahun Pembuatan')
                        ->disabled(),
                ]),
        ];
    }
}
