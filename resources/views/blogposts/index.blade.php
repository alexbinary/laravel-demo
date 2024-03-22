<html>

<body>
    <h1>Hello, Blog posts</h1>

    @forelse ($posts as $post)
        <li><a href="{{ route('blogposts.show', ['blogpost' => $post]) }}">{{ $post->title }}</a></li>
    @empty
        <p>No posts</p>
    @endforelse
</body>

</html>
