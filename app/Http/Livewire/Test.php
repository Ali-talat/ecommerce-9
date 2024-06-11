<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{

    public $num = 0 ;
    public $name  ;
    public $email  ;
    public function up (){
        $this->num++;
    }
    public function down (){
        $this->num--;

    }
    public function save (){
        $this->num--;

    }
    public function render()
    {
        return view('livewire.test');
    }
}
