<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();

        return view('color.index', ['books' => $books]);
    }

    public function show($book_id)
    {
        $book = Book::findOrFail($book_id);

        return view('color.show', [
            'book' => $book,
        ]);
    }

    public function edit($book_id)
    {
        $book = Book::findOrFail($book_id);

        return view('color.edit', [
            'book' => $book,
        ]);
    }

    public function update($book_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'db_color' => 'required|max:6',
        ]);

        $book = Book::findOrFail($book_id);

//        $post_color = hexdec($request->db_color);
        $post_color = $request->db_color;
//        $db_color   = hexdec($book->db_color);
        $db_color   = $book->db_color;
        $count = $book->count + 1;


//        $new_color = ($post_color + $db_color)/$count;
        $new_color = $post_color + $db_color;
        dd($post_color);
        $new_color = dechex($new_color);


        $book->fill($params)->update([
            'db_color'=>$new_color,
            'count'=>$count
            ]);
        return redirect()->route('color.show', ['book'=>$book]);
    }
}
