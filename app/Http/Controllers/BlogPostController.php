<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('blogposts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogposts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        $d = $request->only('title', 'category', 'content');
        $pict = $request->file('picture');

        $path = $pict->store("blogposts_pictures", 'public');
        $post = BlogPost::create($d + ['picture' => $path]);

        return redirect()->route('blogposts.show', ['blogpost' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogpost)
    {
        return view('blogposts.show', ['post' => $blogpost]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogpost)
    {
        return view('blogposts.edit', ['post' => $blogpost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogPostRequest $request, BlogPost $blogpost)
    {
        $d = $request->only('title', 'category', 'content');

        $blogpost->title = $d["title"];
        $blogpost->category = $d["category"];
        $blogpost->content = $d["content"];
        $blogpost->save();

        return redirect()->route('blogposts.show', ['blogpost' => $blogpost]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogpost)
    {
        $blogpost->delete();
        return redirect()->route('blogposts.index');
    }
}
