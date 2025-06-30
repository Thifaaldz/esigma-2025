<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KepemilikanKendaraanResource\Pages;
use App\Models\KepemilikanKendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KepemilikanKendaraanResource extends Resource
{
    protected static ?string $model = KepemilikanKendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Daftar Kepemilikan';
    protected static ?string $pluralModelLabel = 'Kepemilikan Kendaraan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nopol')
                    ->label('Nomor Polisi')
                    ->required(),

                Forms\Components\TextInput::make('no_rangka')
                    ->label('Nomor Rangka')
                    ->required(),

                Forms\Components\TextInput::make('no_mesin')
                    ->label('Nomor Mesin')
                    ->required(),

                Forms\Components\Hidden::make('masyarakat_id')
                    ->default(fn () => auth()->user()?->masyarakat?->id),

                Forms\Components\Hidden::make('kendaraan_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nopol')->label('Nopol'),
                Tables\Columns\TextColumn::make('no_rangka')->label('No Rangka'),
                Tables\Columns\TextColumn::make('no_mesin')->label('No Mesin'),
                Tables\Columns\TextColumn::make('masyarakat.nama')->label('Pemilik'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKepemilikanKendaraans::route('/'),
            'create' => Pages\CreateKepemilikanKendaraan::route('/create'),
            'edit' => Pages\EditKepemilikanKendaraan::route('/{record}/edit'),
        ];
    }
}
