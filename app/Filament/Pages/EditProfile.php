<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static ?string $navigationLabel = 'Profil & Password';

    protected static ?string $title = 'Pengaturan Profil & Password';

    protected static ?int $navigationSort = 11;

    protected string $view = 'filament.pages.edit-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = Auth::user();
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Akun Admin')
                    ->description('Ubah nama, email, dan nomor WhatsApp akun admin Anda.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Nomor WhatsApp (Aktif)')
                            ->tel()
                            ->placeholder('Contoh: 6281234567890')
                            ->helperText('Gunakan format internasional (awalan 62) untuk menerima OTP reset password via WA.')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Ubah Password')
                    ->description('Kosongkan jika Anda tidak ingin mengubah password saat ini.')
                    ->schema([
                        TextInput::make('current_password')
                            ->label('Password Saat Ini')
                            ->password()
                            ->revealable()
                            ->requiredWith('new_password'),
                        TextInput::make('new_password')
                            ->label('Password Baru')
                            ->password()
                            ->revealable()
                            ->minLength(6)
                            ->same('new_password_confirmation'),
                        TextInput::make('new_password_confirmation')
                            ->label('Konfirmasi Password Baru')
                            ->password()
                            ->revealable(),
                    ])->columns(3),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        $user = Auth::user();

        // Check if password change was requested
        if (!empty($data['new_password'])) {
            if (empty($data['current_password']) || !Hash::check($data['current_password'], $user->password)) {
                Notification::make()
                    ->title('Gagal Mengubah Password')
                    ->body('Password saat ini tidak cocok / salah. Silakan coba lagi.')
                    ->danger()
                    ->send();
                return;
            }

            $user->password = Hash::make($data['new_password']);
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'] ?? null;
        $user->save();

        // Clear password fields
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'current_password' => null,
            'new_password' => null,
            'new_password_confirmation' => null,
        ]);

        Notification::make()
            ->title('Profil & Password Berhasil Diperbarui!')
            ->success()
            ->send();
    }
}
