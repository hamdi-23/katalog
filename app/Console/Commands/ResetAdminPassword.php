<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:reset-password {email? : Email akun admin yang akan direset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset password akun admin katalog secara langsung dari terminal';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->argument('email') ?? $this->ask('Masukkan Email Akun Admin');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("Akun admin dengan email '{$email}' tidak ditemukan.");
            return Command::FAILURE;
        }

        $newPassword = $this->secret('Masukkan Password Baru Admin');

        if (empty($newPassword) || strlen($newPassword) < 6) {
            $this->error('Password baru minimal 6 karakter.');
            return Command::FAILURE;
        }

        $confirmPassword = $this->secret('Konfirmasi Password Baru Admin');

        if ($newPassword !== $confirmPassword) {
            $this->error('Konfirmasi password tidak cocok.');
            return Command::FAILURE;
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        $this->info("Password akun admin '{$user->email}' berhasil diperbarui!");
        return Command::SUCCESS;
    }
}
