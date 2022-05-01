<?php declare(strict_types=1);

namespace App\Service;

use App\Events\ArticleWithNewsSourceCreatedEvent;
use App\Events\NewsSourceCreatedEvent;
use App\Factory\NewsSourceFactory;
use App\Models\NewsSource;
use App\Repository\NewsSourceRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsSourceService
{
    public function __construct(
        protected NewsSourceFactory $factory,
        protected NewsSourceRepository $repository,
        protected ArticleService $articleService
    ) {}

    public function getById(int $id): ?NewsSource
    {
        return $this->repository->getById($id);
    }

    public function getAllNewsSources(): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function createNewsSource(array $data): NewsSource
    {
        $newsSource = $this->factory->init();
        $newsSource->name = $data['name'];
        $newsSource->save();

        if (isset($data['article'])) {
            $article = $this->articleService->createArticle($data['article'], $newsSource, true);
            ArticleWithNewsSourceCreatedEvent::dispatch($article, $newsSource);
        } else {
            NewsSourceCreatedEvent::dispatch($newsSource);
        }

        return $newsSource;
    }
}
