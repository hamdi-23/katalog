<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\SimplePage;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class VerifyWhatsappOtp extends SimplePage implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.auth.verify-whatsapp-otp';

    protected static ?string $title = 'Verifikasi Kode OTP WhatsApp';

    public ?array $data = [];

    public ?string $phone = null;
    public ?string $otpCode = null;
    public ?int $userId = null;

    public function mount(): void
    {
        $this->userId = session('reset_user_id');
        $this->phone = session('reset_phone');
        $this->otpCode = session('reset_otp');

        if (!$this->userId) {
            redirect()->route('filament.admin.auth.password-reset.request');
        }
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('otp_code')
                    ->label('Kode OTP (6 Digit)')
                    ->required()
                    ->length(6)
                    ->placeholder('Contoh: 123456')
                    ->autofocus(),

                TextInput::make('password')
                    ->label('Password Baru')
                    ->password()
                    ->revealable()
                    ->required()
                    ->minLength(6)
                    ->same('password_confirmation'),

                TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password Baru')
                    ->password()
                    ->revealable()
                    ->required(),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $formData = $this->form->getState();
        $inputOtp = trim($formData['otp_code']);

        $user = User::find($this->userId);

        if (!$user || !$user->otp_code || $user->otp_code !== $inputOtp) {
            Notification::make()
                ->title('Kode OTP Salah')
                ->body('Kode OTP yang Anda masukkan tidak valid. Silakan periksa kembali.')
                ->danger()
                ->send();
            return;
        }

        if ($user->otp_expires_at && now()->greaterThan($user->otp_expires_at)) {
            Notification::make()
                ->title('Kode OTP Kadaluarsa')
                ->body('Kode OTP telah kadaluarsa (lebih dari 15 menit). Silakan minta kode baru.')
                ->danger()
                ->send();
            return;
        }

        // Reset password
        $user->password = Hash::make($formData['password']);
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        session()->forget(['reset_user_id', 'reset_phone', 'reset_otp']);

        Notification::make()
            ->title('Password Berhasil Direset!')
            ->body('Silakan login menggunakan password baru Anda.')
            ->success()
            ->send();

        redirect()->route('filament.admin.auth.login');
    }
}
