<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->middleware('role:admin')->except(['index', 'show']);
        $this->post = $post;
    }
    public function dashboard()
    {
        $posts = Auth::user()->posts;

        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $post = Auth::user()->posts()->create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Post created successfully');
}


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts')->ignore($post->id),
            ],
            'content' => 'required|string',
        ]);


        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function show($id)
    {

        $post = Post::find($id);

        if (!$post) {

            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        return view('posts.show', compact('post'));
    }
}


