<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KendaraanResource\Pages;
use App\Filament\Admin\Resources\KendaraanResource\RelationManagers;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nopol')->required()->unique(),
                Forms\Components\TextInput::make('no_rangka')->required(),
                Forms\Components\TextInput::make('no_mesin')->required(),
                Forms\Components\Select::make('jenis_roda')
                    ->options([
                        '2' => 'Roda 2',
                        '4' => 'Roda 4',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('merek')->required(),
                Forms\Components\TextInput::make('tipe')->required(),
                Forms\Components\TextInput::make('tahun_pembuatan')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nopol'),
                Tables\Columns\TextColumn::make('merek'),
                Tables\Columns\TextColumn::make('tipe'),
                Tables\Columns\TextColumn::make('tahun_pembuatan'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis_roda')
                ->options([
                    '2' => 'Roda 2',
                    '4' => 'Roda 4',
                ])
                ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
