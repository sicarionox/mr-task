<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsSourceRequest;
use App\Service\NewsSourceService;
use Illuminate\Http\JsonResponse;

class NewsSourceController extends Controller
{
    public function __construct(
        protected NewsSourceService $service
    ) {}

    public function index(): JsonResponse
    {
        $newsSources = $this->service->getAllNewsSources();

        return new JsonResponse($newsSources, 200);
    }

    public function store(CreateNewsSourceRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $newsSource = $this->service->saveNewsSource($validatedData);

        return new JsonResponse($newsSource->name, 200);
    }
}
