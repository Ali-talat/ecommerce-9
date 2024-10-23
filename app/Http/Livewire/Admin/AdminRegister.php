<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;

class AdminRegister extends Component
{

    public $name ;
    public $email ;
    public $password ;

    protected $rules = [  
        'name' => 'required|min:5',  
        'email' => 'required|email',  
        'password' => 'required|min:8',  
    ];  

    protected $messages = [  
        'name.required' => 'The name field is required.',  
        'email.required' => 'The email field is required.',  
        'password.required' => 'The password field is required.',  
    ];  
    public function adminRegister(){

        $this->validate();

        $admin = Admin::create([
            'name' => $this->name,  
            'email' => $this->email,  
            'password' =>\bcrypt($this->password) ,
        ]);

        if($admin){
            return \redirect()->route('admin.login');
        }
        
    }

    public function render()
    {
        return view('livewire.admin.admin-register');
    }
}
