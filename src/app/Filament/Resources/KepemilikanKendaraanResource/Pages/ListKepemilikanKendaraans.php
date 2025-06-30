<?php

namespace App\Filament\Resources\KepemilikanKendaraanResource\Pages;

use App\Filament\Resources\KepemilikanKendaraanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKepemilikanKendaraans extends ListRecords
{
    protected static string $resource = KepemilikanKendaraanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
