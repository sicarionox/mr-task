<?php declare(strict_types=1);

namespace App\Repository;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository
{
    public function getAll(): LengthAwarePaginator
    {
        return Article::query()->paginate(10);
    }
}
