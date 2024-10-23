<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AddProduct extends Component
{
    use WithFileUploads;

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
    public $images =[] ;

    protected $rules = [  
        'name' => 'required|string|max:255|unique:products,name',  
        'slug' => 'required|string|max:255|unique:products,slug',  
        'description' => 'required',
        'short_description' => 'required',
        'price' => 'required',
        'qty' => 'required',
        'sku' => 'required',
        'manage_stock' => 'required',
        'in_stock' => 'required',
        'category' => 'required',
        'images.*' => 'required',
    ]; 

    public function addProduct(Request $request){
        
            $this->validate();
            $this->active = $this->active ? 1 : 0;

            try {

                if (empty($this->images)) {
                    session()->flash('message', 'يجب تحميل صورة واحدة على الأقل للمنتج.'); 
                    return; 
                };

                DB::beginTransaction();
                $product = Product::create([
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
         
                 foreach ($this->images as $image) {
                    
                   $path =  $image->store('products','public');
                     $img = Image::create([
                         'product_id' => $product->id ,
                         'photo' => $path ,
                     ]);
                    
         
                 }
                 $product ->categories()->attach($this->category);
                 $this->images = [];
                 DB::commit();
                \session()->flash('message', 'Category created successfully.');
            } catch (\Exception $ex) {
                DB::rollback();
                session()->flash('error', 'حدث خطأ أثناء الحفظ. يرجى المحاولة مرة أخرى.');
            }
        
        

        // foreach($this->images as $image){
        //     $name = time() . '-' . $image->getClientOriginalName();  
        //     return $name ;
        //     $image->move(public_path('assets/images/products'), $name);  

            // $img = Image::create([
            //     'product_id' => $product->id ,
            //     'photo' => $image ,
            // ]);
        

        
        

    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.product.add-product',\compact('categories'));
    }
}
