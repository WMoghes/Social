<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard(){
        $post = Post::orderBy('created_at', 'desc')->get();
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

    public function getDeletePost($post_id){
        $post = Post::where('id',$post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->route('dashboard');
        }
        $post->delete();

        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }
}
