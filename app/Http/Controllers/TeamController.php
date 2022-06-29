<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;

class TeamController extends Controller
{
    public function team($id)
    {
        $team = Team::find($id);
        $posts = Post::where('team_id', $id)->get();

        return view('blog.team-profile', ['posts' => $posts, 'team' => $team]);
    }
}
