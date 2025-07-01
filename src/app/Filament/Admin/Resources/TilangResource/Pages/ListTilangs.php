<?php

namespace App\Filament\Admin\Resources\TilangResource\Pages;

use App\Filament\Admin\Resources\TilangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTilangs extends ListRecords
{
    protected static string $resource = TilangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
