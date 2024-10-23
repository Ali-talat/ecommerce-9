<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{


    
    // public function addToWishlist($product_id)  
    // {  
    //     if (!auth()->check()) {  
    //         session()->flash('message', 'يجب عليك تسجيل الدخول لإضافة منتجات إلى قائمة الرغبات.');  
    //         return;  
    //     }  

    // if (!in_array($product_id, $this->wishlist)) {  
    //     auth()->user()->wishlist()->attach($product_id);  
    //     $this->wishlist[] = $product_id; 
    //     session()->flash('message', 'تمت إضافة المنتج إلى قائمة الرغبات بنجاح!');  
    //     } else {  
    //     session()->flash('message', 'المنتج موجود بالفعل في قائمة الرغبات.');  
    //     }  
    // }

    public $wishlists = [];

    public function addToWishlist($product_id){

        if (!auth()->check()) {  
            session()->flash('message', 'يجب عليك تسجيل الدخول لإضافة منتجات إلى قائمة الرغبات.');  
            return;  
        }  

        if(!\in_array($product_id,$this->wishlists)){
            auth()->user()->wishlist()->attach($product_id);
            $this->wishlists[] = $product_id; 
            session()->flash('message', 'تمت اضافه المنتج بنجاح');  
            } else {  
            session()->flash('message', ' المنتج موجود في المفضله .');  
            }  
        }

    
    public function render()
    {
        return view('livewire.wishlist');
    }
}



