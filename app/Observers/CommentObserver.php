<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use App\Models\BlogPost;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        if ($comment->commentable_type === BlogPost::class) {
            // dd("I'm created");
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
            Cache::tags(['blog-post'])->forget('mostCommented');
        }
    }
}