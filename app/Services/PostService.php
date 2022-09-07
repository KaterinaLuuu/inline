<?php

namespace App\Services;


use App\Contracts\PostRepositoryContract;
use App\Contracts\PostServiceContract;
use Illuminate\Support\Collection;

class PostService implements PostServiceContract
{
    private int $count = 0;
    private PostRepositoryContract $postRepository;

    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(Collection $posts)
    {
        $posts->each(function ($post) {
            $data = [
                'user_id' => $post['userId'],
                'title'   => $post['title'],
                'body'    => $post['body'],
            ];

            $newPost = $this->postRepository->create($data);

            if (!is_null($newPost)) {
                $this->count++;
            }
        });

        return $this->count;
    }
}


