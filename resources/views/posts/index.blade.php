@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>

            <a href="{{ route('posts.show', ['post' => $post->id]) }}">View</a>
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>

            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
