<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::all();
        return Inertia::render('BlogPosts/Index', [
            'posts' => $posts->map(fn($p) => [
                'post' => $p,
                'picture_url' => $p->picture ? asset('storage/' . $p->picture) : null,
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('BlogPosts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $d = $request->only('title', 'category', 'content');
        if ($request->hasFile('picture')) {

            $pict = $request->file('picture');
            $path = $pict->store("blogposts_pictures", 'public');
            $d += ['picture' => $path];
        }

        $post = BlogPost::create($d);

        return redirect()->route('blogposts.show', ['blogpost' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogpost)
    {
        return Inertia::render('BlogPosts/Show', [
            'post' => $blogpost,
            'picture_url' => $blogpost->picture ? asset('storage/' . $blogpost->picture) : null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogpost)
    {
        return Inertia::render('BlogPosts/Edit', [
            'post' => $blogpost,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogPostRequest $request, BlogPost $blogpost)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);
        
        $d = $request->only('title', 'category', 'content');

        $blogpost->title = $d["title"];
        $blogpost->category = $d["category"];
        $blogpost->content = $d["content"];

        if ($request->hasFile('picture')) {

            $pict = $request->file('picture');
            $path = $pict->store("blogposts_pictures", 'public');
            $blogpost->picture = $path;
        }

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
