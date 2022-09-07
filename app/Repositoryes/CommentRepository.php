<?php

namespace App\Repositoryes;

use App\Contracts\CommentRepositoryContract;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryContract
{
    private Comment $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function getCommentByWord(string $word)
    {
        return $this->model->query()->with('post')->where('body', 'LIKE', "%$word%")->get();
    }

}
