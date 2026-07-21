<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Admin')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->icon('heroicon-m-envelope'),

                TextColumn::make('phone')
                    ->label('WhatsApp')
                    ->placeholder('Belum diatur')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
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
            ]);
    }
}
