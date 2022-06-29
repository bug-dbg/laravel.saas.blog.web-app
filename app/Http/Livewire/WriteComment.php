<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class WriteComment extends Component
{
    public $posts;
    public $newComment;
    
    public function mount($posts) 
    {
        $this->posts = $posts;
    }

    public function addComment ($id) 
    {
        dd('hello');
        $this->validate(['newComment' => 'required']);
        $createdComment = Comment::create([
            'comment' => $this->newComment, 
            'post_id' => $id,
            'user_id' => auth()->user()->id,
        ]);
    }
    public function render()
    {
        return view('livewire.write-comment');
    }
}
