<?php

use App\Filament\Pages\Auth\VerifyWhatsappOtp;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');

Route::get('/admin/verify-whatsapp-otp', VerifyWhatsappOtp::class)
    ->middleware(['web'])
    ->name('admin.verify-whatsapp-otp');
