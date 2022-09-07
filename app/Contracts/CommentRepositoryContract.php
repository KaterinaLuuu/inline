<?php

namespace App\Contracts;

interface CommentRepositoryContract
{
    public function create($data);

    public function getCommentByWord(string $word);
}
