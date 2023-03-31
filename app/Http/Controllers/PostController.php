<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    /**
     * Display a list of posts
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $posts = Post::all();

        return View::make('posts.index', compact('posts'));
    }

    /**
     * Show details about a post
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Post $post) {
        $post->load('comments');

        return View::make('posts.show', compact('post'));
    }
}
