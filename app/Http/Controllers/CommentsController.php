<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'text' => 'required|max:2000',
        ]);
        //findOrFail クエリの取得なければ例外を返す
        $post = Post::findOrFail($params['post_id']);

        $comments = new Comment();
        $comments->post_id = $request->post_id;
        $comments->user_id = Auth::user()->id;
        $comments->text    = $request->text;
        $comments->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }
}