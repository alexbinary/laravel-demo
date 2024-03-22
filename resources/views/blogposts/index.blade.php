<html>

<body>
    <h1>Hello, Blog posts</h1>

    @forelse ($posts as $post)
        <li>{{ $post->title }}</li>
    @empty
        <p>No posts</p>
    @endforelse
</body>

</html>
