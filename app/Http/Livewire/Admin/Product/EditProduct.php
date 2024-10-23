<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product_id ;

    public $name ;
    public $description ;
    public $short_description ;
    public $slug ;
    public $price ;
    public $special_price ;
    public $special_price_start ;
    public $special_price_end ;
    public $qty ;
    public $sku ;
    public $manage_stock = \true;
    public $in_stock = \true ;
    public $category ;
    public $active ;
    public $product ;
    public $images = [] ;

    

    public function mount($id){

        $this->product_id = $id ;
        $product = Product::find($id);
        $this->product = $product ;
        $this->name = $product->name;   # استخدمت هذا السطر لاعرض القيمه المسجله في الداتابيز في صفحه الاديت بدلا من عرضها في صفحه البلايد#
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->short_description = $product->short_description;
        $this->price = $product->price;
        $this->special_price = $product->special_price;
        $this->special_price_start = $product->special_price_start;
        $this->special_price_end = $product->special_price_end;
        $this->qty = $product->qty;
        $this->sku = $product->sku;
        $this->in_stock = $product->in_stock;
        $this->manage_stock = $product->manage_stock;
        // $this->category = $product->category;
        $this->active = $product->active;
        

    }

    public function updateProduct(){

         $this->validate([
            'name' => ['required','string','max:255',Rule::unique('products')->ignore($this->product_id)],  
            'slug' => ['required','string','max:255',Rule::unique('products')->ignore($this->product_id)],
            'description' => 'required',
            'short_description' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'sku' => 'required',
            'manage_stock' => 'required',
            'in_stock' => 'required',
            'category' => 'required',
            'images.*' => 'required',
         ]);

        $product = Product::find($this->product_id);

        if($product){
            $product->update([
                'name' => $this->name , 
                'slug' => $this->slug , 
                'description' => $this->description , 
                'short_description' => $this->short_description , 
                'price' => $this->price , 
                'special_price' => $this->special_price , 
                'special_price_start' => $this->special_price_start , 
                'special_price_end' => $this->special_price_end , 
                'qty' => $this->qty , 
                'sku' => $this->sku , 
                'manage_stock' => $this->manage_stock , 
                'in_stock' => $this->in_stock , 
                'active' => $this->active , 
            ]);

            if($this->images){
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
            foreach ($this->images as $image) {
                    
                $path =  $image->store('products','public');
                  $product->images()->create([
                      'product_id' => $product->id ,
                      'photo' => $path ,
                  ]);
                 
      
              }
            }
            $product ->categories()->attach($this->category);

            session()->flash('message', 'تم تحديث الفئة بنجاح.');  
        }else{
            return 'product not found' ;
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.edit-product',\compact('categories'));
    }
}
