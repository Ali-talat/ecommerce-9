<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name','is_active'];

    protected $casts = [
        'active'=> 'boolean'
    ];

    public function scopeActive($query)  
    {  
        return $query->where('active', 1);  
    }   

    public function getActive(){
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل' ;
    }


    
    public function products()
    {
        return $this->hasMany(Product::class,'brand_id');
    }
}
