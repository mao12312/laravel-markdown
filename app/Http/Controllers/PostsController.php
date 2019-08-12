<?php

namespace App\Http\Controllers;

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

        foreach ($files as $file){
        $filename = $file->getClientOriginalName();
        $file->storeAs('/public/post_img', $filename);

        $posts->images()->create([
            'path' => $filename,
//            'post_id'=> $request->id,
        ]);


//            $post_images = new PostImage();
//            $post_images->post_id = $request->post_id;
//            $post_images->path = $filename;
//            $post_images->save();
        }

//        foreach ($request->file('files') as $index=> $e) {
//
//            $post_image = new PostImage();
////            $ext = $e['image']->guessExtension();
//            $filename = "{$e['image']->getClientOriginalName()}";
//            $path = $e['image']->storeAs('images', $filename);
//            // photosメソッドにより、商品に紐付けられた画像を保存する
//            $post_image->create(['path'=> $path]);
//            $post_image->save();
//        }


        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
//        $post_image = PostImage::findOrFail($post_id);

        return view('posts.show', [
            'post' => $post,
//            'post_image'=>$post_image,
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
}
