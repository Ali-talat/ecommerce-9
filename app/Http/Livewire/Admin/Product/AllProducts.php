<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProducts extends Component
{
    use WithPagination ;
    public function render()
    {
        $products = Product::orderBy('name','ASC')->paginate(5);

        return view('livewire.admin.product.all-products',\compact('products'));
    }
}
