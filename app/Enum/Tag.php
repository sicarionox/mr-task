<?php declare(strict_types=1);

namespace App\Enum;

enum Tag: string
{
    case GENERAL = 'General';
    case ECONOMY = 'Economy';
    case FUN = 'Fun';
    case POLITICS = 'Politics';
}
