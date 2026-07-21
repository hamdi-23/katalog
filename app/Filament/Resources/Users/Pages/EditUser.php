<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Data Admin Berhasil Diperbarui!')
            ->body('Perubahan data akun admin telah disimpan.');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function (DeleteAction $action, $record) {
                    if ($record->id === Auth::id()) {
                        $action->cancel();
                        Notification::make()
                            ->title('Tidak Dapat Menghapus Akun Sendiri!')
                            ->body('Anda sedang menggunakan akun ini.')
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
