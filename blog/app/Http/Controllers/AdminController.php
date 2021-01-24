<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function admin (){
        $posts = Post::all();
        $user = auth()->user();
        return view('admin.admin',['posts' => $posts, 'user' => $user]);
    }

    public function update($post_id){
        $visable = DB::table('posts')->where('id', $post_id)->value('visable');
        if ($visable == '1'){
            Post::where('id', $post_id)->update(['visable' => '0']);
        } elseif($visable == '0'){
            Post::where('id', $post_id)->update(['visable' => '1']);
        }
        return redirect('/admin')->with('response', 'Post visability changed');
    }
}
