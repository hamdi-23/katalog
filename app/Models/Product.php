<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'original_price',
        'image',
        'shopee_url',
        'tiktok_url',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
