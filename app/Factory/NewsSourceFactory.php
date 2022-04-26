<?php declare(strict_types=1);

namespace App\Factory;

use App\Models\NewsSource;

class NewsSourceFactory
{
    public function init(): NewsSource
    {
        return new NewsSource();
    }
}
