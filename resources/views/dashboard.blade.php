@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    @if($posts && $posts->count() > 0)
        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            </div>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif
@endsection
