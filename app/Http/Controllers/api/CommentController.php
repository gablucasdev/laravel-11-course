<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store()
    {
        $data = Comment::all();
        return response()->json($data, 200);
    }
}
