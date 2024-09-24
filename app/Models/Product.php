<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'brand_id',
        'slug',
        'sku',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'manage_stock',
        'qty',
        'in_stock',
        'active',
        'viewed'
    ];

    
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

}

