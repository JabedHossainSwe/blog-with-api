@extends('layouts.app')

@section('content')
    <h1>{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h1>

    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
        @csrf
        @if (isset($post))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : old('title') }}">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ isset($post) ? $post->content : old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
