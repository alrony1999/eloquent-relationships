<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($id)
    {
        $books=User::find($id)->books()->get();
        // foreach ($books as $book) {
        //     var_dump($book->name);
        // }
        // dd();
        return view('books.index', ['books'=>$books]);
    }
    public function show($id)
    {
        $book=Book::find($id);
        //dd($book->authors);
        return view('books.show', ['book'=>$book]);
    }
}
