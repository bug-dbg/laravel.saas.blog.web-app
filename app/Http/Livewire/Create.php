<?php

namespace App\Http\Livewire;

use App\Models\Post;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{

    use AuthorizesRequests;

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
    public function createBlogPost()
    {   
        $validatedData = $this->validate();
        $validatedData['user_id'] = auth()->id();
        $validatedData['team_id'] = auth()->user()->currentTeam->id;

        Post::create($validatedData);

        return redirect(route('dashboard'));
    }


    public function render()
    {
        return view('livewire.create');
    }
}
