<?php

namespace App\Console\Commands;

use App\Contracts\CommentServiceContract;
use App\Contracts\PostServiceContract;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetPostsComments extends Command
{

    private string $url;
    private string $posts;
    private string $comments;

    private PostServiceContract $postServiceContract;
    private CommentServiceContract $commentServiceContract;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:get-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение постов с комментариев';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostServiceContract $postServiceContract,
                                CommentServiceContract $commentServiceContract
    ) {
        parent::__construct();

        $this->url = config('app.inline.url');
        $this->posts = config('app.inline.posts');
        $this->comments = config('app.inline.comments');

        $this->postServiceContract = $postServiceContract;
        $this->commentServiceContract = $commentServiceContract;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Начало импорта');

        $posts = Http::get($this->url . $this->posts);
        $comments = Http::get($this->url . $this->comments);
        $this->info('Импортированны записи и комментарии');

        if ($posts->status() !== 200 || $comments->status() !== 200) {
            throw new \Exception('Сервис недоступен');
        }

        $countPosts = $this->postServiceContract->create($posts->collect());
        $this->info('Записаны посты в БД');
        $countComments = $this->commentServiceContract->create($comments->collect());
        $this->info('Записаны комментарии в Бд');
        $this->info('Загружено ' . $countPosts . ' записей и ' . $countComments . ' комментариев');
    }
}
