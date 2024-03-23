<html>

<body>
    <a href="{{ route('blogposts.index') }}">Home</a>

    @if ($post->picture)
        <p><img src="{{ asset('storage/' . $post->picture) }}" width=200 /></p>
    @endif

    <h1>{{ $post->title }}</h1>
    <p>Category: {{ $post->category }}</p>

    <p>{{ $post->content }}</p>

    <form action="{{ route('blogposts.destroy', ['blogpost' => $post]) }}" method="post">
        <input class="btn btn-default" type="submit" value="Delete" />
        @method('delete')
        @csrf
    </form>
    <a href="{{ route('blogposts.edit', ['blogpost' => $post]) }}">Edit</a>
</body>

</html>
