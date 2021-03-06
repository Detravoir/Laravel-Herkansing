<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $user = auth()->user();
        $array = array();
        foreach($posts as $post) {
            if(!in_array($post->category, $array)){
                array_push($array, $post->category);
           }
        }

        return view('home',['posts' => $posts, 'user' => $user, 'array' => $array]);
    }

}
