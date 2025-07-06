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

                    Forms\Components\Select::make('jenis_pelanggaran')
                    ->label('Jenis Pelanggaran')
                    ->options([
                        'Tidak memakai helm' => 'Tidak memakai helm',
                        'Melanggar rambu lalu lintas' => 'Melanggar rambu lalu lintas',
                        'Melanggar marka jalan' => 'Melanggar marka jalan',
                        'Tidak membawa STNK' => 'Tidak membawa STNK',
                        'Tidak membawa SIM' => 'Tidak membawa SIM',
                        'Tidak menggunakan sabuk pengaman' => 'Tidak menggunakan sabuk pengaman',
                        'Menggunakan HP saat berkendara' => 'Menggunakan HP saat berkendara',
                        'Melawan arus' => 'Melawan arus',
                        'Melebihi batas kecepatan' => 'Melebihi batas kecepatan',
                        'Berkendara di bawah pengaruh alkohol' => 'Berkendara di bawah pengaruh alkohol',
                        'Kendaraan tidak laik jalan' => 'Kendaraan tidak laik jalan',
                        'Knalpot tidak standar' => 'Knalpot tidak standar',
                        'Pelanggaran plat nomor' => 'Pelanggaran plat nomor',
                        'Berboncengan lebih dari 2 orang' => 'Berboncengan lebih dari 2 orang',
                        'Tidak menyalakan lampu utama' => 'Tidak menyalakan lampu utama',
                        'Pelanggaran emisi atau uji KIR' => 'Pelanggaran emisi atau uji KIR',
                        'Pelanggaran parkir sembarangan' => 'Pelanggaran parkir sembarangan',
                        'Tidak membayar pajak kendaraan' => 'Tidak membayar pajak kendaraan',
                        'Menggunakan kendaraan tidak sesuai peruntukan' => 'Menggunakan kendaraan tidak sesuai peruntukan',
                        'Surat-surat kendaraan palsu' => 'Surat-surat kendaraan palsu',
                    ]),

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
        return $user->hasRole('super_admin','masyarakat'); 
    }
    public static function shouldRegisterNavigation(): bool
    {
        logger('shouldRegisterNavigation dijalankan!');
        return auth()->user()?->hasAnyRole(['super_admin', 'polisi']);
    }
    
}
