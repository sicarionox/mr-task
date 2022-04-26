<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $service
    ) {}

    public function index(): JsonResponse
    {
        $articles = $this->service->getAllArticles();

        return new JsonResponse($articles, 200);
    }

    public function store(Request $request): JsonResponse
    {

    }
}
