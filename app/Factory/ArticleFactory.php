<?php declare(strict_types=1);

namespace App\Factory;

use App\Models\Article;

class ArticleFactory
{
    public function init(): Article
    {
        return new Article();
    }
}
