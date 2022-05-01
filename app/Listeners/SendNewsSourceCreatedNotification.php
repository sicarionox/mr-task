<?php declare(strict_types=1);

namespace App\Listeners;

use App\Events\NewsSourceCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsSourceCreatedNotification implements ShouldQueue
{
    public function __construct()
    {}

    public function handle(NewsSourceCreatedEvent $event)
    {
        logger('News source (id ' . $event->newsSource->id . ') created');
    }
}
