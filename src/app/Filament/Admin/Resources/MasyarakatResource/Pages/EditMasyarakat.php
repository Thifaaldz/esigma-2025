<?php

namespace App\Filament\Admin\Resources\MasyarakatResource\Pages;

use App\Filament\Admin\Resources\MasyarakatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasyarakat extends EditRecord
{
    protected static string $resource = MasyarakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
