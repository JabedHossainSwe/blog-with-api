
@extends('layouts.app')

@section('content')
    <h2>Create Post</h2>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4" required></textarea>
        
        <button type="submit">Create Post</button>
    </form>
@endsection
