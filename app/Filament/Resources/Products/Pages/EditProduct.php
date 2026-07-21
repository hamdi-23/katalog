<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Produk Berhasil Diperbarui!')
            ->body('Data produk telah berhasil disimpan.');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (!empty($data['images']) && is_array($data['images'])) {
            $formatted = [];
            foreach ($data['images'] as $item) {
                if (is_string($item)) {
                    $formatted[] = ['image_path' => $item];
                } elseif (is_array($item)) {
                    $formatted[] = $item;
                }
            }
            $data['images'] = $formatted;
        } elseif (empty($data['images']) && !empty($data['image'])) {
            $data['images'] = [['image_path' => $data['image']]];
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['images']) && is_array($data['images'])) {
            $first = array_values($data['images'])[0] ?? null;
            if (is_array($first) && isset($first['image_path'])) {
                $data['image'] = $first['image_path'];
            } elseif (is_string($first)) {
                $data['image'] = $first;
            }
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
