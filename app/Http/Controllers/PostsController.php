<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->get();
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


        $files = $request->file('file');

        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('/public/post_img', $filename);

            $posts->images()->create([
                'path' => $filename,
            ]);
        }
        return redirect()->route('top');
    }

    public function show(Post $post)
    {
        $userAuth = Auth::user();
        $defaultCount = count($post->likes);
        $post->load('likes');
        $defaultLiked = $post->likes->where('user_id', $userAuth->id)->first();
        if(count($defaultLiked) == 0) {
            $defaultLiked == false;
        } else {
            $defaultLiked == true;
        }

        return view('posts.show', [
            'post' => $post,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultCount' => $defaultCount
        ]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

}
