<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AllCategory extends Component
{
    use WithPagination;

    public function delete($slug){
       $category= Category::where('slug',$slug)->first();

       if($category){
        $category->delete();
        \session()->flash('message','Category deleted successfully.');
       }else{
        \session()->flash('error', 'Category not found.');
       }
    }

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.category.all-category',\compact('categories'));
    }
}
