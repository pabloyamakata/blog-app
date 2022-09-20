<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest('id')->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::where('status', 'published')
                            ->where('category_id', $post->category_id)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();
        
        return view('posts.show', compact('post', 'relatedPosts'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
                     ->where('status', 'published')
                     ->latest('id')
                     ->paginate(5);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 'published')
                              ->latest('id')
                              ->paginate(5);

        return view('posts.tag', compact('posts', 'tag'));
    }
}
