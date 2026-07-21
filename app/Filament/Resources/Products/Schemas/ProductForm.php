<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\RawJs;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->label('Deskripsi Produk')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Harga Jual')
                    ->numeric()
                    ->prefix('Rp')
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->stripCharacters('.')
                    ->placeholder('Misal: 150.000'),
                TextInput::make('original_price')
                    ->label('Harga Asli (Harga Coret)')
                    ->numeric()
                    ->prefix('Rp')
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->stripCharacters('.')
                    ->placeholder('Misal: 180.000 (Kosongkan jika tidak diskon)'),
                Repeater::make('images')
                    ->label(function ($state) {
                        $count = is_array($state) ? count($state) : 0;
                        $remaining = max(0, 6 - $count);
                        return "Foto Produk ({$count}/6 Terisi - Sisa {$remaining} Slot Kosong)";
                    })
                    ->schema([
                        FileUpload::make('image_path')
                            ->hiddenLabel()
                            ->image()
                            ->directory('products')
                            ->visibility('public')
                            ->maxSize(2048) // 2MB
                            ->required(),
                    ])
                    ->maxItems(6)
                    ->grid([
                        'default' => 2,
                        'sm' => 3,
                        'md' => 4,
                        'lg' => 6,
                    ])
                    ->addActionLabel('Unggah Foto (+)')
                    ->collapsible(false)
                    ->reorderableWithButtons(false)
                    ->live()
                    ->helperText(function ($state) {
                        $count = is_array($state) ? count($state) : 0;
                        $remaining = max(0, 6 - $count);
                        if ($count === 0) {
                            return '📷 Belum ada foto diunggah. Klik tombol "Unggah Foto (+)" di atas untuk menambah foto (Maksimal 6 foto).';
                        }
                        return "✅ Terunggah: {$count} foto. 📌 Sisa slot kosong: {$remaining} foto. Kartu #1 adalah foto utama di katalog.";
                    })
                    ->columnSpanFull(),
                TextInput::make('shopee_url')
                    ->label('Tautan Shopee')
                    ->url()
                    ->placeholder('https://shopee.co.id/username/product-id')
                    ->suffixIcon('heroicon-m-link'),
                TextInput::make('tiktok_url')
                    ->label('Tautan TikTok')
                    ->url()
                    ->placeholder('https://www.tiktok.com/@username/video/id')
                    ->suffixIcon('heroicon-m-link'),
                TextInput::make('sort_order')
                    ->label('Nomor Urutan')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->default(fn () => (int) (\App\Models\Product::max('sort_order') ?? 0) + 1)
                    ->unique(table: 'products', column: 'sort_order', ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Nomor urutan :input sudah digunakan oleh produk lain. Silakan pilih nomor urutan yang lain.',
                    ])
                    ->placeholder('Misal: 1, 2, 10, 57, 100 ...')
                    ->helperText('Otomatis di-generate dari urutan tertinggi (+1). Bisa diubah manual dan tidak boleh sama dengan produk lain.'),
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true)
                    ->required(),
            ]);
    }
}
