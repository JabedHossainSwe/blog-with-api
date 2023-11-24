
<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('put')

    {{-- Your form fields --}}
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $post->title }}" />

    <label for="content">Content:</label>
    <textarea name="content">{{ $post->content }}</textarea>

    <button type="submit">Update Post</button>
</form>
