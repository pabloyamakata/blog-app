<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = ['red', 'green', 'blue', 'purple', 'indigo', 'orange', 'yellow'];

        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:tags',
            'color' => 'required|string|max:10'
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => $request->name,
            'color' => $request->color
        ]);

        return redirect()->route('admin.tags.create')
                         ->with('store-tag-success', 'Record was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors = ['red', 'green', 'blue', 'purple', 'indigo', 'orange', 'yellow'];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:tags',
            'color' => 'required|string|max:10'
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => $request->name,
            'color' => $request->color
        ]);

        return redirect()->route('admin.tags.edit', $tag)
                         ->with('update-tag-success', 'Record was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')
                         ->with('destroy-tag-success', 'Record was deleted successfully');
    }
}
