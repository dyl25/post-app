<?php

namespace App\Http\Livewire;

use App\Services\CommentService;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class CommentForm extends Component
{

    public int $postId;
    public ?int $commentId = null;
    public ?string $comment = null;
    public Collection $commentList;
    private CommentService $commentService;

    public function __construct()
    {
        parent::__construct();

        $this->commentService = new CommentService();
    }

    /**
     * Load comments that has been sent for a post
     *
     * @return void
     */
    public function loadCommentList()
    {
        $this->commentList = $this->commentService->all($this->postId);
    }

    /**
     * Render the component
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->loadCommentList();

        return View::make('livewire.comment-form');
    }

    /**
     * Triggered when comment input change and will update database with new content
     *
     * @return void
     */
    public function updatedComment(): void
    {
        if (!$this->commentId) {
            $this->commentId = $this->commentService->create($this->postId);
        }

        $this->commentService->updateContent($this->commentId, $this->comment);
    }

    /**
     * Reset the form
     *
     * @return void
     */
    private function resetForm(): void
    {
        $this->comment = null;
        $this->commentId = null;
    }

    /**
     * Send the comment
     *
     * @return void
     */
    public function save(): void
    {
        $this->commentService->sent($this->commentId);

        $this->resetForm();

        $this->loadCommentList();
    }
}
