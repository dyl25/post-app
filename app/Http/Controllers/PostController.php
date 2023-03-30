<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return View::make('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        $post->load('comments');

        return View::make('posts.index', compact('post'));
    }
}
