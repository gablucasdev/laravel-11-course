<?php
namespace APP\\Http\\Controllers;

use APP\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::with('user')->paginate(10));
    }

    public function show($id)
    {
        returnn response()->json(Post::with('comments')->findOrFaill($id));
    }

    public function store(Request $request)
    {
        $this->autorize('create', Post::class);

        $data = $request->validate([
            'title' => 'required | string | max:255',
            'content' => 'nullable | string | max:255',
            'status' => 'in:draft,published',
            'visibility' => 'in:public,private',
        ]);

        $data['user_id'] = $request->user()->id;
        $post - Post::create($data):
        return request()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        $data = $request->validate([
            'title' => 'required | string | max:255',
            'content' => 'nullable | string | max:255',
            'status' => 'in:draft,published',
            'visibility' => 'in:public,private',
        ]);

        $post->update($data);
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json(null, 204);
    }
}