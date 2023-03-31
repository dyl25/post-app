<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct() {
        $this->commentService = new CommentService();
    }

    /**
     * Get data about comments and related posts
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function data()
    {
        $commentsData = $this->commentService->getCommentsData();

        return View::make('comments.data', compact('commentsData'));
    }
}
