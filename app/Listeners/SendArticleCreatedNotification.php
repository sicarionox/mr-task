<?php declare(strict_types=1);

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendArticleCreatedNotification implements ShouldQueue
{
    public function __construct(

    ) {}

    public function handle(ArticleCreatedEvent $event)
    {
        logger('Article (id ' . $event->article->id . ') created');
    }
}
