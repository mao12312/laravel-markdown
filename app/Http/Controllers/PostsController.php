<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
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

        // if ($params->fails()) {
        //     return redirect('/posts/index')
        //         ->withInput()
        //         ->withErrors($params);
        // }

        $posts = new Post;
        $posts->user_id = Auth::user()->id;
        $posts->title = $request->title;
        $posts->text = $request->text;
        $posts->save();
        return redirect()->route('top');
    }
}
