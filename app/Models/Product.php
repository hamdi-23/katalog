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
        'images',
        'shopee_url',
        'tiktok_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getImagesListAttribute(): array
    {
        $list = [];
        if (!empty($this->images) && is_array($this->images)) {
            foreach ($this->images as $item) {
                if (is_array($item) && !empty($item['image_path'])) {
                    $list[] = $item['image_path'];
                } elseif (is_string($item) && !empty($item)) {
                    $list[] = $item;
                }
            }
        }
        if (empty($list) && !empty($this->image)) {
            $list[] = $this->image;
        }
        return array_slice($list, 0, 6);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
