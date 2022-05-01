<?php declare(strict_types=1);

namespace App\Service;

use App\Events\ArticleCreatedEvent;
use App\Factory\ArticleFactory;
use App\Models\Article;
use App\Models\NewsSource;
use App\Repository\ArticleRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function __construct(
        protected ArticleFactory $factory,
        protected ArticleRepository $repository
    ){}

    public function getAllArticles(): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function createArticle(array $data, NewsSource $newsSource, bool $fromNewsSource = false): Article
    {
        $article = $this->factory->init();

        $article->title = $data['title'];
        $article->tags = implode(',', $data['tags']);
        $newsSource->articles()->save($article);

        if (!$fromNewsSource) {
            ArticleCreatedEvent::dispatch($article);
        }

        return $article;
    }
}
