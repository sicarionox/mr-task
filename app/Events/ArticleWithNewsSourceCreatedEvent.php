<?php declare(strict_types=1);

namespace App\Events;

use App\Models\Article;
use App\Models\NewsSource;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleWithNewsSourceCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Article $article,
        public NewsSource $newsSource
    ) {}
}
