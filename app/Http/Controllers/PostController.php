<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::get();
            return response()->json([
            'message'=>'List of Posts',
            'posts'=>$post
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create($validated);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post
        ], 200);
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'message' => 'Single Post',
            'post' => $post
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
{
    // dd( $post->toArray());
    // dd( $request->all());
    $post->update([
        'name' => $request->name,
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return response()->json([
        'message' => 'Post updated successfully',
        'post' => $post
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully'
        ], 200);
    }

}
