<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class AddProduct extends Component
{

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

    protected $rules = [  
        'name' => 'required|string|max:255|unique:products,name',  
        'slug' => 'required|string|max:255|unique:products,slug',  
        'description' => 'required',
        'short_description' => 'required',
        'price' => 'required',
        'special_price' => 'required',
        'special_price_start' => 'required',
        'special_price_end' => 'required',
        'qty' => 'required',
        'sku' => 'required',
        'manage_stock' => 'required',
        'in_stock' => 'required',
        'category' => 'required',
        'active' => 'required',
    ]; 

    public function addProduct(Request $request){
        
            $this->validate();
            if($this->active){
                $this->active = 1;
            }else{
                $this->active = 0 ;

            };

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
           'active' => $this->active , 
        ]);
        $product ->categories()->attach($this->category);
        \session()->flash('message', 'Category created successfully.');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.product.add-product',\compact('categories'));
    }
}
