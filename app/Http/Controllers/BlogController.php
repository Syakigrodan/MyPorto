<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->latest('published_at')
            ->paginate(6);

        return view('blog', compact('posts'));
    }

    public function show(Post $post)
    {
        abort_unless($post->is_published && $post->published_at !== null && $post->published_at->isPast(), 404);

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('post', compact('post', 'related'));
    }
}