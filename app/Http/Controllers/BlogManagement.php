<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Team;
use Illuminate\Http\Request as HttpRequest;

class BlogManagement extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return view ('blog.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('blog.post');
    }

    public function store(PostRequest $request)
    {
        $post = $request->validated();
        $post = Post::create($post);
        return redirect('student')->with('flash_message', 'Your blog has succesfully posted!'); 
    }

    public function edit(HttpRequest $request, $id) 
    {
        $user = $request->user();
        $post = Post::find($id);

/*         if($post == null){
            abort(401, 'post not found or you don\t have permission');
        } */
/* 
        dd($user->currentTeam->id); */
        
        /* dd( $post->team_id); */
        if ($user->currentTeam->id != $post->team_id) {
            abort(401, 'You don\'t have permission to delete');
        }

        $post = Post::find($id);
        return view('blog.editPost')->with('posts', $post);
    }

    public function update(PostRequest $postReq, HttpRequest $request, $id)
    {
        $user = $request->user();
        $post = Post::find($id);

       /*  if($post == null){
            abort(401, 'post not found or you don\t have permission');
        } */
        
        /* if ($user->currentTeam->id != $post->team_id) {
            abort(401, 'You don\'t have permission to update');
        } */

        $input = $postReq->validated();
        $post->update($input);
        return redirect('dashboard')->with('flash_message', 'Post updated successfully!'); 
    }


    public function show($id)
    {
        $posts = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('blog.details', ['posts' => $posts, 'comments' => $comments]);
        /* return view('blog.details')->with(compact('posts', 'comments')); */
    }


    public function destroy(HttpRequest $request, $id)
    {
        $user = $request->user();
        $post = Post::find($id);

        if($post == null){
            abort(401, 'post not found or you don\t have permission');
        }
        
        if ($user->currentTeam->id != $post->team_id) {
            abort(401, 'You don\'t have permission to delete');
        }
        
        Post::destroy($id);
        return redirect('dashboard')->with('flash_message', 'Post deleted successfully!'); 
    }
}