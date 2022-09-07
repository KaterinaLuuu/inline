<?php

namespace App\Repositoryes;

use App\Contracts\PostRepositoryContract;
use App\Models\Post;

class PostRepository implements PostRepositoryContract
{
    private Post $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->firstOrCreate($data);
    }
}
