<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Akun Admin')
                    ->description('Masukkan data nama, email, dan nomor WhatsApp untuk admin.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Nomor WhatsApp')
                            ->tel()
                            ->placeholder('Contoh: 6281234567890')
                            ->helperText('Gunakan format 628... untuk menerima OTP reset password via WA.')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Kata Sandi (Password)')
                    ->description('Tentukan password untuk login admin.')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->minLength(6)
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    ]),
            ]);
    }
}
