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

    public function getManage_stock(){
        return $this->manage_stock == 1 ? 'اتاحه التتبع' : 'عدم اتاحه التتبع' ;
    }

    public function getIn_stock(){
        return $this->in_stock == 1 ? ' متاح' : '  غير متاح' ;
    }

    public function getActive(){
        return $this-> is_active == 0 ? 'غير مفعل' : 'مفعل';
    }
    
    public function wishlist()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    
    

}

