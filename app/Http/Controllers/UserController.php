<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        
        return view('blog.profile', ['posts' => $posts, 'user' => $user]);
    }
}
