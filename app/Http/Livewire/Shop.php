<?php

namespace App\Http\Livewire;
use Gloudemans\Shoppingcart\Facades\Cart as shopingCart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{

    public $wishlists =[];
    public $successMessage = '';  
    public $showMessage = false; 
    use WithPagination ;
    public function addtocart($id){

        $product = Product::find($id);

        if($product->special_price !== \null){
            $price = $product->special_price ;
        }else{
            $price = $product->price ;
        }
        
       $cart = shopingCart::add(
            $product->id,
            $product->name,
            1,
            $price ,
            
        );
        $this->successMessage = 'تمت الإضافة بنجاح!';  
        $this->showMessage = true;  

        // إخفاء الرسالة بعد 3 ثوانٍ  
        // $this->dispatchAfterResponse(function () {  
        //     sleep(3); // الانتظار لمدة 3 ثوانٍ  
        //     $this->showMessage = false;  
        // }); 
    }
   
    
    // public function decrease($rowId){
    //     $product = shopingCart::get($rowId);
    //     $qty = $product->qty - 1;
    //     shopingCart::update($rowId, $qty);
       
    // }


    public function addToWishlist($product_id){

        if (!auth()->check()) {  
            session()->flash('message', 'يجب عليك تسجيل الدخول لإضافة منتجات إلى قائمة الرغبات.');  
            return;  
        }  

        if(!\in_array($product_id,$this->wishlists)){
            auth()->user()->wishlist()->attach($product_id);
            $this->wishlists[] = $product_id; 
            return response()->join([
                'status'=> true,
              'msg'=>'تمت الاضافه'
            ]);
        }else{
            return response()->join([
                'status'=> \false,
              'msg'=>'تمت الاضافه من قبل'
            ]);
        }
    }
    


    
    public function render()
    {
        $products = Product::paginate(9);
        return view('livewire.shop', \compact('products'));
    }
}
