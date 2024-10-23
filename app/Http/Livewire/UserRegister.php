<?php

namespace App\Http\Livewire;

use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use App\Models\User;
use Livewire\Component;

class UserRegister extends Component
{
    public $name ;
    public $email ;
    public $password ;

    public function storeUser(RegisterRequest $registerRequest){
        
        
       $user = User::create([
            'name'=>$registerRequest->name ,
            'email'=>$registerRequest->email ,
            'password'=>\bcrypt($registerRequest->password),
        ]);
        if($user){
            return \redirect()->route('login');
        }
    }

    

    public function render()
    {
        return view('livewire.user-register');
    }


}
