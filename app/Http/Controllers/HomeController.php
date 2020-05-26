<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\NewNotification;
use App\Notification;
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
       $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id ,
            'comment' => $request->comment
        ]);
        $data = [
            'user_id'=> auth()->id(),
            'post_id' => $post->id ,
            'comment' => $request->comment
        ];
        event(new NewNotification($data));

        Notification::create([
            'user_id'=> auth()->id(),
            'post_id' => $post->id ,
            'comment' => $request->comment
        ]);
        return back();
    }
}
