<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'brand_name',
        'brand_tagline',
        'logo',
        'banner',
    ];

    public static function current(): self
    {
        return static::firstOrCreate([], [
            'brand_name' => 'Katalog Jelly',
            'brand_tagline' => 'Paket Usaha & Bahan Baku',
        ]);
    }
}
