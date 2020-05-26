<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

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
        $posts = Post::get();
        return view('home',compact('posts'));
    }
    public function CommentStore(Request $request,Post $post){
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id ,
            'comment' => $request->comment
        ]);
        return back();
    }
}
