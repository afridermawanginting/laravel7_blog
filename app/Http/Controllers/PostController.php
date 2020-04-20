<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{ 
    public function index()
    {
        $posts = Post::latest()->paginate(env('PER_PAGE'));

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required|min:10',
        ]);

        Post::create([
            'title' =>  request('title'),
            'slug' =>  Str::slug(request('title')),
            'content' =>  request('content'),
            'category_id' =>  request('category_id'),
        ]);
 
        return redirect()->route('post.index')->with('success', 'Post create success!');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // $post = Post::find($id);
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        // $post = Post::find($id);
        $this->validate(request(), [
            'title' =>  'required',
            'content' =>  'required',
            'category_id' =>  'required',
        ]);

        $post->update([
            'title' =>  request('title'),
            'slug' =>  Str::slug(request('title')),
            'content' =>  request('content'),
            'category_id' =>  request('category_id')
        ]);

        return redirect()->route('post.index')->with('info', 'Post Update success!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('danger', 'Post Delete success!');;
    }
}
