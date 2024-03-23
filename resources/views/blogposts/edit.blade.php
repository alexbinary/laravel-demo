<html>

<body>
    <a href="{{ route('blogposts.index') }}">Home</a>

    <h1>Edit post</h1>

    <form action="{{ route('blogposts.update', ['blogpost' => $post]) }}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <input type="text" name="title" value="{{ $post->title }}">
        <input type="text" name="category" value="{{ $post->category }}">
        <textarea name="content">{{ $post->content }}</textarea>
        <input type="file" name="picture" />
        <input type="submit" value="Submit">
    </form>

</body>

</html>
