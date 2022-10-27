<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest('id')->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = Post::create([
            'name' => $request->name,
            'slug' => $request->name,
            'extract' => $request->extract,
            'body' => $request->body,
            'status' => $request->status,
            'category_id' => $request->category,
            'user_id' => $request->user_id
        ]);

        if($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
            $post->image()->create([
                'url' => $url
            ]);
        }

        if($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.create')
                         ->with('store-post-success', 'Record was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('isAuthor', $post);

        $categories = Category::all();
        $tags = Tag::all();
        $postTags = $post->tags->pluck('id')->all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'postTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        $this->authorize('isAuthor', $post);

        $post->update([
            'name' => $request->name,
            'slug' => $request->name,
            'extract' => $request->extract,
            'body' => $request->body,
            'status' => $request->status,
            'category_id' => $request->category
        ]);

        if($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            if($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)
                         ->with('update-post-success', 'Record was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('isAuthor', $post);
        
        if($post->image) {
            Storage::delete($post->image->url);
            $post->image->delete();
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
                         ->with('destroy-post-success', 'Record was deleted successfully');
    }
}
