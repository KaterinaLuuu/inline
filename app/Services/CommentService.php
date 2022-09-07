<?php

namespace App\Services;

use App\Contracts\CommentRepositoryContract;
use App\Contracts\CommentServiceContract;
use Illuminate\Support\Collection;

class CommentService implements CommentServiceContract
{
    private CommentRepositoryContract $commentRepository;
    private int $count = 0;

    public function __construct(CommentRepositoryContract $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }


    public function create(Collection $comments)
    {
        $comments->each(function ($comment) {
            $data = [
                'post_id' => $comment['postId'],
                'name'    => $comment['name'],
                'email'   => $comment['email'],
                'body'    => $comment['body'],
            ];

            $newComment = $this->commentRepository->create($data);

            if (!is_null($newComment)) {
                $this->count++;
            }
        });

        return $this->count;
    }

    public function getCommentByWord(string $word)
    {
        return $this->commentRepository->getCommentByWord($word);
    }

}
