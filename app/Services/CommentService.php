<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CommentService
{
    /**
     * Get all comments that has been sent for a post
     *
     * @param int|null $postId The related post
     * @return Collection
     */
    public function all(?int $postId): Collection
    {
        return DB::table('comments')
            ->when($postId, function (Builder $query, int $postId) {
                $query->where('post_id', $postId);
            })
            ->where('sent', true)
            ->get();
    }

    /**
     * Create a new comment and return its id
     *
     * @param int $postId The related post
     * @return int The id of the created comment
     */
    public function create(int $postId): int
    {

        $comment = new Comment();

        $comment->post_id = $postId;
        $comment->user_id = Auth::id();

        $comment->save();

        return $comment->id;
    }

    /**
     * Update comment content
     *
     * @param int $id The id of the comment
     * @param string $content The content of the comment
     * @return void
     */
    public function updateContent(int $id, string $content): void
    {
        $comment = Comment::find($id);

        $comment->content = $content;

        $comment->save();
    }

    /**
     * Mark the comment has sent
     *
     * @param int $id The id of the comment
     * @return void
     */
    public function sent(int $id): void
    {
        $comment = Comment::find($id);

        $comment->sent = true;

        $comment->save();
    }

    /**
     * Get different count data about comments and related post
     *
     * @return EloquentCollection
     */
    public function getCommentsData(): EloquentCollection {
        return Post::withCount([
            'comments',
            'comments as posted_comments_count' => function (QueryBuilder $query) {
                $query->where('sent', true);
            },
            'comments as deleted_comments_count' => function (QueryBuilder $query) {
                $query->where('sent', false);
            }])->get();
    }
}
