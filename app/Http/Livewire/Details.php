<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Details extends Component
{
    public $posts;
    
    public function mount($posts) 
    {
        $this->posts = $posts;
    }
  
    public function render()
    {
        return view('livewire.details');
    }
}
