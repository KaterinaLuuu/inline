<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface PostServiceContract
{
    public function create(Collection $posts);
}
