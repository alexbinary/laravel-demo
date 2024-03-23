<html>

<body>
    <a href="{{ route('blogposts.index') }}">Home</a>

    <h1>New post</h1>

    <form action="{{ route('blogposts.store') }}" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="text" name="category">
        <textarea name="content"></textarea>
        <input type="submit" value="Submit">
    </form>

</body>

</html>
