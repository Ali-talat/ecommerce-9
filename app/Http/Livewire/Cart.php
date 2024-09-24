<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as shopingCart;
use Livewire\Component;

class Cart extends Component
{

    
    public function addtocart($id){

        $product = Product::find($id);

        if($product->special_price !== \null){
            $price = $product->special_price ;
        }else{
            $price = $product->price ;
        }
        
        shopingCart::add(
            $product->id,
            $product->name,
            1,
            $price ,
            
        );
        return \redirect()->route('cart');

    }
    public function increase($rowId){
        $product = shopingCart::get($rowId);
        $qty = $product->qty + 1;
        shopingCart::update($rowId, $qty);
       
    }
    
    
    public function decrease($rowId){
        $product = shopingCart::get($rowId);
        $qty = $product->qty - 1;
        shopingCart::update($rowId, $qty);
       
    }

    
    public function delete($rowId){
        
        shopingCart::remove($rowId);
    }

    public function destroy($rowId){
        
        shopingCart::destroy($rowId);
        
    }
    
    
    public function setAmountForCheckout(){
        
        \session()->put('checkout',[
            
            'discount'=> 0 ,
            'subtotal' => shopingCart::subtotal(),
            'tax' => shopingCart::tax(),
            'total'=> shopingCart::total()
        ]);

    }
    public function render()
    {
        return view('livewire.cart');
    }
   
}
