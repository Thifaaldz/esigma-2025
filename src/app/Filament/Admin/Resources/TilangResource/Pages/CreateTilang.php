<?php

namespace App\Filament\Admin\Resources\TilangResource\Pages;

use App\Filament\Admin\Resources\TilangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTilang extends CreateRecord
{
    protected static string $resource = TilangResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['petugas_id'] = auth()->id();
        return $data;
    }
}
