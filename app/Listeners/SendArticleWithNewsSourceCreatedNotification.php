<?php declare(strict_types=1);

namespace App\Listeners;

use App\Events\ArticleWithNewsSourceCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendArticleWithNewsSourceCreatedNotification implements ShouldQueue
{
    public function __construct(

    ) {}

    public function handle(ArticleWithNewsSourceCreatedEvent $event)
    {
        logger('News source (id ' . $event->newsSource->id . ') created with article (id ' . $event->article->id . ')');
    }
}
