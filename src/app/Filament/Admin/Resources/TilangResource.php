<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TilangResource\Pages;
use App\Models\Tilang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TilangResource extends Resource
{
    protected static ?string $model = Tilang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Verifikasi Tilang';
    protected static ?string $navigationGroup = 'e-Tilang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kendaraan_id')
                    ->relationship('kendaraan', 'nopol')
                    ->searchable()
                    ->required()
                    ->label('Nomor Polisi'),

                Forms\Components\TextInput::make('jenis_pelanggaran')
                    ->required()
                    ->label('Jenis Pelanggaran'),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi Pelanggaran'),

                Forms\Components\DatePicker::make('tanggal_pelanggaran')
                    ->required()
                    ->label('Tanggal Pelanggaran'),

                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->label('Lokasi Kejadian'),

                Forms\Components\Select::make('status')
                    ->options([
                        'Belum Diverifikasi' => 'Belum Diverifikasi',
                        'Terverifikasi' => 'Terverifikasi',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->default('Belum Diverifikasi')
                    ->required()
                    ->label('Status'),

                Forms\Components\Hidden::make('petugas_id')
                    ->default(fn () => auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kendaraan.nopol')
                    ->label('Nopol')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenis_pelanggaran')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_pelanggaran')
                    ->date()
                    ->label('Tanggal'),

                Tables\Columns\TextColumn::make('lokasi'),

                Tables\Columns\BadgeColumn::make('status')->colors([
                    'primary' => 'Belum Diverifikasi',
                    'success' => 'Terverifikasi',
                    'danger' => 'Ditolak',
                ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'Belum Diverifikasi' => 'Belum Diverifikasi',
                    'Terverifikasi' => 'Terverifikasi',
                    'Ditolak' => 'Ditolak',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTilangs::route('/'),
            'create' => Pages\CreateTilang::route('/create'),
            'edit' => Pages\EditTilang::route('/{record}/edit'),
        ];
    }

    public static function viewAny(): bool
    {
        return in_array(auth()->user()?->role, ['super_admin', 'polisi']);
    }
    public static function shouldRegisterNavigation(): bool
    {
        logger('shouldRegisterNavigation dijalankan!');
        return auth()->user()?->hasAnyRole(['super_admin', 'polisi']);
    }
    
}
