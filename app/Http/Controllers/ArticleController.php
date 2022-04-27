<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Service\ArticleService;
use App\Service\NewsSourceService;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $service,
        protected NewsSourceService $newsSourceService
    ) {}

    public function index(): JsonResponse
    {
        $articles = $this->service->getAllArticles();

        return new JsonResponse($articles, 200);
    }

    public function store(CreateArticleRequest $request): JsonResponse
    {

        $response = new JsonResponse();
        $validatedData = $request->validated();
        $newsSource = $this->newsSourceService->getById($validatedData['newsSourceId']);

        if (!$newsSource) {
            $response->setStatusCode(500);
            $response->setContent('No valid news source found');
        } else {
            $article = $this->service->createArticle($validatedData, $newsSource);
            $response->setStatusCode(200);
            $response->setContent($article->title);
        }

        return $response;
    }
}
