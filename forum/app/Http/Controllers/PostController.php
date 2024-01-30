<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Posts/Index', [
            'posts' => Post::all(),
        ]);
    }
}
