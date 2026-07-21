<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Produk Berhasil Ditambahkan!')
            ->body('Produk baru telah berhasil dibuat.');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['images']) && is_array($data['images'])) {
            $first = array_values($data['images'])[0] ?? null;
            if (is_array($first) && isset($first['image_path'])) {
                $data['image'] = $first['image_path'];
            } elseif (is_string($first)) {
                $data['image'] = $first;
            }
        }

        if (empty($data['sort_order'])) {
            $data['sort_order'] = (int) (\App\Models\Product::max('sort_order') ?? 0) + 1;
        }

        return $data;
    }
}
