<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index(int $post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return response()->json(['message' => 'Post não encontrado'], 404);
        }

        $comments = $post->comments()->get();

        return response()->json($comments, 200);
    }


    public function store(StoreCommentRequest $request, int $post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return response()->json(['message' => 'Post não encontrado'], 404);
        }

        $validated = $request->validated();
        $validated['post_id'] = $post_id;
        $validated['user_id'] = 1; // Usuário fixo por enquanto
        $validated['status'] = 'published';

        $comment = Comment::create($validated);

        $comment = $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => 1,
        ]);

        return response()->json($comment, 201);
    }

    public function show(int $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comentário não encontrado'], 404);
        }

        return response()->json($comment, 200);
    }

    public function update(UpdateCommentRequest $request, int $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comentário não encontrado'], 404);
        }

        if ($comment->user_id !== 1) {
            return response()->json(['message' => 'Você não tem permissão para editar este comentário'], 403);
        }

        $comment->update($request->validated());
        $comment->save();

        return response()->json($comment, 200);
    }

    public function destroy(int $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(true, 200);
    }
}
