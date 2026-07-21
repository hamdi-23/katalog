<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Admin', User::count())
                ->description('Jumlah akun pengelola admin')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
            Stat::make('Total Produk', Product::count())
                ->description('Jumlah semua produk')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),
            Stat::make('Produk Aktif', Product::where('is_active', true)->count())
                ->description('Produk tampil di katalog')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Total Kategori', Category::count())
                ->description('Jumlah kategori produk')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),
        ];
    }
}
