<?php declare(strict_types=1);

namespace App\Repository;

use App\Models\NewsSource;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsSourceRepository
{
    public function getAll(): LengthAwarePaginator
    {
        return NewsSource::query()->paginate(10);
    }
}
