<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();

        return response()->json($post, 200);
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = 1;
        $post = Post::create($validated);
        return response()->json($post);
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    public function update(UpdatePostRequest $request, int $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        $post->save();
        return response()->json($post, 200);
    }


    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(true, 200);
    }
}
