<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo' ,
        'product_id'
    ];

    public function getPhotoAttribute($val){
        return $val ? \asset('storage/'.$val) : '';
    }
}
