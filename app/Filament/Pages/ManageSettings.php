<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Pengaturan Toko';

    protected static ?string $title = 'Pengaturan Banner & Brand Toko';

    protected static ?int $navigationSort = 10;

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = Setting::current();
        $this->form->fill([
            'brand_name' => $setting->brand_name,
            'brand_tagline' => $setting->brand_tagline,
            'logo' => $setting->logo,
            'banner' => $setting->banner,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Identitas Brand & Toko')
                    ->description('Atur nama brand dan tagline yang tampil di bagian header katalog.')
                    ->schema([
                        TextInput::make('brand_name')
                            ->label('Nama Brand / Toko')
                            ->required()
                            ->placeholder('Contoh: Katalog Jelly'),
                        TextInput::make('brand_tagline')
                            ->label('Tagline / Sub-judul')
                            ->placeholder('Contoh: Paket Usaha & Bahan Baku'),
                        FileUpload::make('logo')
                            ->label('Logo Brand / Toko')
                            ->image()
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->columnSpanFull()
                            ->helperText('Format: PNG/JPG. Rekomendasi ukuran: 500 x 500 pixel (Rasio 1:1 Persegi).'),
                    ])->columns(2),

                Section::make('Banner Hero Utama')
                    ->description('Unggah banner promo utama yang tampil Full Width di halaman depan katalog.')
                    ->schema([
                        FileUpload::make('banner')
                            ->label('Banner Hero Full Width')
                            ->image()
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(4096)
                            ->helperText('Rekomendasi ukuran banner: 1200 x 300 pixel (Rasio 4:1).'),
                    ]),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $setting = Setting::current();
        $setting->update($data);

        Notification::make()
            ->title('Pengaturan Berhasil Disimpan!')
            ->success()
            ->send();
    }
}
