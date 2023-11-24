<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Instead of using static access, create an instance of the Post model
        $posts = new Post();

        // Now you can use $posts to fetch data or perform other operations
        $data = $posts->someMethod(); // Replace with the actual method you want to call

        return view('posts.index', compact('data'));
    }

    public function create()
    {
        // Show the form for creating a new post
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data (customize this based on your requirements)
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Exclude the _token field from the request data
        $data = $request->except('_token');

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }



    public function edit(Post $post)
    {
        // Show the form for editing a specific post
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Update the specified post in the database
        // Validate request, update post, etc.
        $post->update($request->all());

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Remove the specified post from the database
        $post->delete();

        return redirect()->route('posts.index');
    }
}