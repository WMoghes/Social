<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function getDashboard(){
        $post = Post::all();
        return view('dashboard', ['posts' => $post]);
    }

    public function postCreatePost(Request $request){
        // Validate
        $this->validate($request, [
            'body' => 'required|max:300'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'Something wrong';
        if($request->user()->posts()->save($post)){
            $message = 'Post successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }
}
