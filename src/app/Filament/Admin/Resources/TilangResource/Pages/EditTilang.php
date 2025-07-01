<?php

namespace App\Filament\Admin\Resources\TilangResource\Pages;

use App\Filament\Admin\Resources\TilangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTilang extends EditRecord
{
    protected static string $resource = TilangResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['petugas_id'] = auth()->id();
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
