<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
   public function index($post_id)
   {
        $post = Post::find($post_id);
    
        if (!post) {
            return response()-json(['message' => 'Post não encontrado'], 404);
        }
    
        $coments = $post->comments()->with('user')->get();
        return response()->json($comments, 200);
   }

   public function store(Request $request, $post_id)
   {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post = Post::find($post_id);

        if (!$post) {
            return response()->json(['message' => 'Post não encontrado'], 404);
        }

        $comment = Comment::create([
            'post_id' => $post_id,
            'user_id' => 1,
            'content' => $request->content,
            'status' => 'published',
        ]);

        return response()->json([
            'message' => 'Comentario criado com sucesso',
            'comment' => $comment
        ], 201);
   }

   public function update(Request $request, $id)
   {
        $comment = COmment::find($id);

        if (!$comment) {
         return response()->json(['message' => 'Comentario não encontrado'], 404);
        }

        if ($comment->user_id !== 1) {
         return response()->json(['message' => "você não tem permmissao para editar este comentário"], 403);
        }

        $request->validate([
         'content' => 'required|string|max:1000',
        ]);

        $comment->update([
         'content' => $request->content,
        ]);

        return response()->json([
         'message' => 'Comentário atualizado com sucesso',
         'comment' => $comment
        ], 200);
   }

   public function destroy($id)
   {
        $comment = Comment::find($id)

        if (!comment) {
            return response()->json(['message' => 'Comentário não encontrado'], 404);
        }

        if ($comment->user_id !== 1) {
            return response()->json(['message' => 'Você não tem permissão para excluir este comentário'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Cometário excluido com sucesso'], 200);
   }
}
