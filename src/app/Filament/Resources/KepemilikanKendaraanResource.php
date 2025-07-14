<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KepemilikanKendaraanResource\Pages;
use App\Models\KepemilikanKendaraan;
use App\Models\Kendaraan;
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

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasAnyRole(['Masyarakat', 'super_admin']);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('kendaraan_id')
                ->label('Pilih Kendaraan')
                ->options(function () {
                    return Kendaraan::where('user_id', auth()->id())
                        ->whereDoesntHave('kepemilikanKendaraan')
                        ->pluck('nopol', 'id');
                })
                ->searchable()
                ->required(),

            Forms\Components\Hidden::make('masyarakat_id')
                ->default(fn () => auth()->user()?->masyarakat?->id),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kendaraan.nopol')->label('Nomor Polisi'),
                Tables\Columns\TextColumn::make('kendaraan.no_rangka')->label('No. Rangka'),
                Tables\Columns\TextColumn::make('kendaraan.no_mesin')->label('No. Mesin'),
                Tables\Columns\TextColumn::make('kendaraan.merek')->label('Merek'),
                Tables\Columns\TextColumn::make('kendaraan.tipe')->label('Tipe'),
                Tables\Columns\TextColumn::make('masyarakat.nama')->label('Nama Pemilik'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'view' => Pages\ViewKepemilikanKendaraan::route('/{record}'),
        ];
    }

    public static function viewAny(): bool
    {
        return auth()->user()?->hasRole('masyarakat');
    }
}
