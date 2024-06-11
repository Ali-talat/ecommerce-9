<?php

namespace App\Http\Livewire;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserLogin extends Component
{
    public $email ;
    public $password ;
    
    public function store(LoginRequest $request){

     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect()->route('home');
     }else{
        return \redirect()->back();
     }
     

    }
    public function render()
    {
        return view('livewire.user-login');
    }
}
