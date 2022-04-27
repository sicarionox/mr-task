<?php declare(strict_types=1);

namespace App\Repository;

use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsSourceRepository
{
    /**
     * @param int $id
     * @return NewsSource|Model
     */
    public function getById(int $id): ?NewsSource
    {
        return NewsSource::query()->where('id', '=', $id)->first();
    }

    public function getAll(): LengthAwarePaginator
    {
        return NewsSource::query()->with('articles')->paginate(10);
    }
}
