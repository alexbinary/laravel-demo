<html>

<body>
    <a href="{{ route('blogposts.index') }}">Home</a>

    <h1>Edit post</h1>

    <form action="{{ route('blogposts.update', ['blogpost' => $post]) }}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
        <input type="text" name="category" value="{{ old('category', $post->category) }}">
        <textarea name="content">{{ old('content', $post->content) }}</textarea>
        <input type="file" name="picture" />
        <input type="submit" value="Submit">
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</body>

</html>
