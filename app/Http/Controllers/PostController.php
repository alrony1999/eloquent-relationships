<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id)
    {
        $posts=Post::where('author_id', $id)->get();
        return view('posts.index', ['posts'=>$posts]);
    }
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show', ['post'=>$post]);
    }
}
