<html>

<body>
    <a href="{{ route('blogposts.index') }}">Home</a>

    <h1>New post</h1>

    <form action="{{ route('blogposts.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <input type="text" name="title" value="{{ old('title') }}">
        <input type="text" name="category" value="{{ old('category') }}">
        <textarea name="content">{{ old('content') }}</textarea>
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
