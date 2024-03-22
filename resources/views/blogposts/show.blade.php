<html>

<body>
    <h1>{{ $post->title }}</h1>
    <p>Category: {{ $post->category }}</p>

    <p>{{ $post->content }}</p>

    <form action="{{ route('blogposts.destroy', ['blogpost' => $post]) }}" method="post">
        <input class="btn btn-default" type="submit" value="Delete" />
        @method('delete')
        @csrf
    </form>
</body>

</html>