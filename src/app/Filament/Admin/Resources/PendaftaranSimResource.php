<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PendaftaranSimResource\Pages;
use App\Filament\Admin\Resources\PendaftaranSimResource\RelationManagers;
use App\Models\PendaftaranSim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftaranSimResource extends Resource
{
    protected static ?string $model = PendaftaranSim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required(),
                Forms\Components\TextInput::make('jenis_sim')
                    ->required(),
                Forms\Components\TextInput::make('lokasi_ujian')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ktp_path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foto_path')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('jenis_sim'),
                Tables\Columns\TextColumn::make('lokasi_ujian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ktp_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPendaftaranSims::route('/'),
            'create' => Pages\CreatePendaftaranSim::route('/create'),
            'edit' => Pages\EditPendaftaranSim::route('/{record}/edit'),
        ];
    }
}
