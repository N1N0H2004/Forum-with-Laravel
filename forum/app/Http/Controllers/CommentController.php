<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class);
    }
    public function store(Request $request, Post $post) {

        $data = $request->validate(['body' => ['required', 'string', 'max:2500']]);

        Comment::create([
            ...$data,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
            ]);

        return to_route('posts.show', $post);
    }

    public function destroy(Request $request, Comment $comment)
    {

        $comment->delete();

        return to_route('posts.show', $comment->post_id);
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate(['body' => ['required', 'string', 'max:2500']]);

        $comment->update($data);

        return to_route('posts.show', ['post' => $comment->post_id, 'page' => $request->query('page')]);
    }
}
