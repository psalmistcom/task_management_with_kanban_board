<?php

namespace App\Enum;

enum StatusEnum: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case IN_PROGRESS = 'in_progress';
}
