<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;

class CustomRequestPasswordReset extends RequestPasswordReset
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Radio::make('method')
                    ->label('Metode Reset Password')
                    ->options([
                        'email' => '📧 Kirim Link via Email',
                        'whatsapp' => '📱 Kirim Kode OTP via WhatsApp',
                    ])
                    ->default('email')
                    ->live()
                    ->required(),

                TextInput::make('email')
                    ->label('Alamat Email Admin')
                    ->email()
                    ->required()
                    ->visible(fn ($get) => ($get('method') ?? 'email') === 'email'),

                TextInput::make('phone')
                    ->label('Email atau Nomor WhatsApp Admin')
                    ->required()
                    ->placeholder('Contoh: admin@gmail.com atau 6281234567890')
                    ->visible(fn ($get) => $get('method') === 'whatsapp'),
            ])
            ->statePath('data');
    }

    public function request(): void
    {
        $data = $this->form->getState();
        $method = $data['method'] ?? 'email';

        if ($method === 'email') {
            parent::request();
            return;
        }

        // WhatsApp Reset Flow
        $input = trim($data['phone'] ?? '');
        $cleanPhone = preg_replace('/[^0-9]/', '', $input);

        $user = User::where('email', $input)
            ->orWhere('phone', $input)
            ->when(!empty($cleanPhone), function ($query) use ($cleanPhone) {
                $query->orWhere('phone', 'like', '%' . $cleanPhone . '%');
            })
            ->first();

        if (!$user) {
            Notification::make()
                ->title('Akun Tidak Ditemukan')
                ->body('Tidak ditemukan akun admin dengan email / nomor WhatsApp tersebut.')
                ->danger()
                ->send();
            return;
        }

        $otp = (string) rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(15);
        $user->save();

        session([
            'reset_user_id' => $user->id,
            'reset_phone' => $user->phone ?? $cleanPhone,
            'reset_otp' => $otp,
        ]);

        $this->redirect(route('admin.verify-whatsapp-otp'));
    }
}
