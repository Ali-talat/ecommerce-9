<?php

namespace App\Http\Livewire\Admin\Category;
use Livewire\Attributes\Validate;
use App\Http\Requests\newCategoryRequest;
use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    public $name ;
    public $slug ;
    public $is_active ;
    public $parent_id ;
    public $type ;

    protected $rules = [  
        'name' => 'required|string|max:255|unique:categories,name',  
        'slug' => 'required|string|max:255|unique:categories,slug',  
        'type'=>'required_without:id|in:1,2',  
    ]; 
    
public function addCategory(){

    $this->validate();
    if($this->is_active){
        $this->is_active = 1;
    }else{
        $this->is_active = 0 ;

    };
    Category::create([
                'name'=>$this->name,
                'slug'=>$this->slug,
                'is_active'=>$this->is_active,
                'parent_id'=>$this->parent_id,
            ]);

    session()->flash('message', 'Category created successfully.');


}

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.add-category',\compact('categories'));
    }
}
