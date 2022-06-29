<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $newComment;
    
    public function mount($comments) 
    {
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
