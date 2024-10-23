<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;  


class AllProducts extends Component
{
    use WithPagination ;


    public function delete($slug){
        $product= Product::where('slug',$slug)->first();
 
        if($product){

            
            $oldImages = $product->images; 

            // مسح الصور من مجلد التخزين  
            foreach ($oldImages as $oldImage) {  
                // إزالة الصورة من التخزين  
                // $oldImagePath= Str::after($oldImage, 'products/');
                $oldImagePath= \basename($oldImage->photo);
                
                if (Storage::disk('products')->exists($oldImagePath)) {  
                    Storage::disk('products')->delete($oldImagePath);  
                }   
            }  
            $product->images()->delete();
         $product->delete();
         
         \session()->flash('message','product deleted successfully.');
        }else{
         \session()->flash('error', 'product not found.');
        }
     }
    public function render()
    {
        $products = Product::orderBy('name','ASC')->paginate(5);

        return view('livewire.admin.product.all-products',\compact('products'));
    }
}
