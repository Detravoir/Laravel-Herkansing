<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(){

        if(Auth::check()) {
            return view('posts.post');
        }
        else{
            return redirect('login');
        }
    }

    public function addSong(Request $request){


        $this->validate($request, [
            'songname' => 'required',
            'artist' => 'required',
            'category' => 'required',
            'url' => 'required'
        ]);

        $post= new Post;
        $post->user_name = auth()->user()->name;
        $post->song_title = $request->input('songname');
        $post->song_artist = $request->input('artist');
        $post->category = $request->input('category');
        $post->song_url = $request->input('url');
        $post->save();

        return redirect('post')->with('response', 'Song Added Succesfully');
    }

    public function deletePost($post_id){
        Post::where('id', $post_id)
            ->delete();

        return redirect('/home')->with('response', 'Post Deleted Successfully');
    }

    public function search(Request $request){
        $keyword = $request->input('search');
        $posts = Post::where('song_title', 'LIKE', '%'.$keyword. '%')->get();
        return view('posts.searchposts', ['posts' => $posts]);

    }
}
