<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{

    public $email ;
    public $password ;

    protected $rules = [  
        'email' => 'required|email',  
        'password' => 'required|min:8',  
    ];  

    protected $messages = [  
        'email.required' => 'The email field is required.',  
        'password.required' => 'The password field is required.',  
    ];  
    public function login(){

        $this->validate();
        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])){
           return redirect()->route('home');
        }else{
           return \redirect()->back()->with('error','هناك خطا في تحميل البيانات');
        }
        
        
   
    }

    public function render()
    {
        return view('livewire.admin.admin-login');
    }
}
