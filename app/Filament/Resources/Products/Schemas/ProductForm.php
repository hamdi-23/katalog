<?php

namespace App\Filament\Resources\Products\Schemas;

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
                    ->required()
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
                FileUpload::make('image')
                    ->label('Foto Produk')
                    ->image()
                    ->directory('products')
                    ->visibility('public')
                    ->maxSize(2048) // 2MB
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
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true)
                    ->required(),
            ]);
    }
}
