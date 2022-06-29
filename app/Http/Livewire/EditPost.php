<?php

namespace App\Http\Livewire;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class EditPost extends Component
{

    public $posts;
    
    public function mount($posts) 
    {
        $this->posts = $posts;
    }

    /**
     * Post title
     *
     * @var string
     */
    public $title;

    /**
     * Post description
     *
     * @var string
     */
    public $description;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|max:255|string',
        'description' => 'required|string',
    ];

    /**
     * Create blog post
     *
     * @return Redirect
     */

    public function editBlogPost() 
    {
       /*  $user = PostRequest::filled();
        dd($user);
        $post = Post::find($id);

        if($post == null){
            abort(401, 'post not found or you don\t have permission');
        }
        
        if ($user->currentTeam->id != $post->team_id) {
            abort(401, 'You don\'t have permission to update');
        }

        $input = $postReq->validated();
        $post->update($input);
        return redirect('dashboard')->with('flash_message', 'Post updated successfully!');  */

        $validatedData = $this->validate();
        $validatedData['user_id'] = auth()->id();
        $validatedData['team_id'] = auth()->user()->currentTeam->id;

        /* dd($validatedData); */

        /* $post = Post::find($id); */

        Post::create($validatedData);

        return redirect(route('dashboard'));
    } 

    public function render()
    {
        return view('livewire.edit-post');
    }
}
