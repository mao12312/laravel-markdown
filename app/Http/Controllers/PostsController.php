<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|Max:50',
            'text' => 'required|Max:2000',
        ]);

        $posts = new Post();
        $posts->user_id = Auth::user()->id;
        $posts->title = $request->title;
        $posts->text = $request->text;
        $posts->save();
        return redirect()->route('top');
    }

    public function show($post_id){
        $post = Post::findOrFail($post_id);

        return view('posts.show',[
            'post'=>$post,]);
    }
}
