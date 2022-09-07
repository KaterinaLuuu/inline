<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface CommentServiceContract
{
    public function create(Collection $comments);

    public function getCommentByWord(string $word);
}
