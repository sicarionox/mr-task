<?php declare(strict_types=1);

namespace App\Service;

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

    public function getAllNewsSources(): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function saveNewsSource(array $data): NewsSource
    {
        $newsSource = $this->factory->init();
        $newsSource->name = $data['name'];
        $newsSource->save();

        if (isset($data['article'])) {
            $this->articleService->createArticle($data['article']);
        }

        return $newsSource;
    }
}
