<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function createComment()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        /* $this->authorize('create', Post::class); */

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'string|max:255',
            'status' => 'in:draft,published',
            'visibility' => 'in:public,private',
        ]);

        $data['user_id'] = $request->user()->id;
        $post = Post::create($data);

        return redirect()->route('posts.index', $post->id)
                         ->with('success', 'Postagem criada com sucesso.');
    }

    public function show($id)
    {
        $post = Post::with(['comments.user', 'user'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        /* $this->authorize('update', $post); */

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'string|max:255',
            'status' => 'in:draft,published',
            'visibility' => 'in:public,private',
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Postagem atualizada.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        /* $this->authorize('delete', $post); */

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Postagem removida.');
    }
}
