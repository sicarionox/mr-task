<?php declare(strict_types=1);

namespace App\Service;

use App\Factory\ArticleFactory;
use App\Models\Article;
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

    public function createArticle(array $data): Article
    {
        $article = $this->factory->init();

        $article->title = $data['title'];
//        $article->newsSource->save($newsSource);
        $article->save();

        return $article;
    }
}
