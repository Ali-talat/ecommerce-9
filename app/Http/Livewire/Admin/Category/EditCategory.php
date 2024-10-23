<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditCategory extends Component
{
    public $category_id ;
    public $name ;
    public $slug ;
    public $type ;
    public $is_active ;
    public $parent_id ;

    public function mount($id)  
    {
        $this->category_id = $id;  
        $category = Category::find($id);
        $this->name = $category->name;   #استخدمت هذا السطر لاعرض القيمه في صفحه الاديت بدلا من عرضها في صفحه البلايد#
        $this->slug = $category->slug;
        
        $this->is_active = $category->is_active;
        $this->parent_id = $category->parant_id;


    }

    public function updateCategory()  
    {  
        $this->validate([  
            'name' => ['required','string','max:255', Rule::unique('categories')->ignore($this->category_id)]  ,
            'slug' => ['required','string','max:255', Rule::unique('categories')->ignore($this->category_id)]  ,  
            'type'=>'required_without:id|in:1,2', 
        ]);  

        $category = Category::find($this->category_id);  
        if($this->is_active){
            $this->is_active = 1;
        }else{
            $this->is_active = 0 ;
    
        };
        if($category){
            $category->update([
                'name'=> $this->name,
                'slug'=> $this->slug,
                'parent_id'=> $this->parent_id,
                'is_active'=> $this->is_active,
            ])  ;
        }else{
            return 'category not found';
        }
        
        
        session()->flash('message', 'تم تحديث الفئة بنجاح.');  
    }  

    
    
    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.category.edit-category',\compact('categories'));
    }
}
