<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index($id)
    {
        $posts=Post::where('author_id', $id)->get();
        return view('posts.index', ['posts'=>$posts,'author'=>$id]);
    }
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show', ['post'=>$post]);
    }
    public function fetchPost($id)
    {
        $posts=Post::where('author_id', $id)->get();
        if ($posts->count()) {
            return response()->json([
                'status'=>200,
                'posts'=>$posts
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'Empty'
            ]);
        }
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'author'=>'required|numeric',
            'title'=>'required|unique:posts,title|min:5',
            'slug'=>'required|unique:posts,slug|min:5',
            'body'=>'required',
        ]);
        if ($validator->fails()) {
            return response()
            ->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
        } else {
            $post=new Post();
            $post->author_id=$request->input('author');
            $post->title=$request->input('title');
            $post->slug=$request->input('slug');
            $post->body=$request->input('body');
            $post->save();

            return response()
            ->json([
                    'status'=>200,
                    'message'=>'Added successfully'
                ]);
        }
    }
    public function edit($author_id, $id)
    {
        $post=Post::where('id', $id)->where('author_id', $author_id)->first();
        if ($post) {
            return response()
            ->json([
                'status'=>200,
                'post'=>$post
            ]);
        } else {
            return response()
            ->json([
                'status'=>404,
                'message'=>'Could not find'
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $validator=Validator::make($request->all(), [
                    'edit_title'=>['required','min:5',Rule::unique('posts', 'title')->ignore($post->id)],
                    'edit_slug'=>['required','min:5',Rule::unique('posts', 'slug')->ignore($post->id)],
                    'edit_body'=>'required',
                ]);
        if ($validator->fails()) {
            return response()
            ->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
        } elseif ($post) {
            $post->title=$request->input('edit_title');
            $post->slug=$request->input('edit_slug');
            $post->body=$request->input('edit_body');
            $post->save();

            return response()
            ->json([
                    'status'=>200,
                    'message'=>'Updated successfully'
                ]);
        } else {
            return response()
                        ->json([
                                'status'=>404,
                                'message'=>'Could not find'
                            ]);
        }
    }
    public function destroy($id)
    {
        $post=Post::find($id);
        if ($post) {
            $post->delete();

            return response()
            ->json([
                'status'=>200,
                'message'=>'Delete successfully'
            ]);
        } else {
            return response()
                        ->json([
                            'status'=>404,
                            'message'=>'Could not Find'
                        ]);
        }
    }
}
