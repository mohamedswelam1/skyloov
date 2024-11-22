<?php

namespace App\Enums;

class TaskStatus
{
    const PENDING = 'pending';
    const IN_PROGRESS = 'in_progress';
    const COMPLETED = 'completed';
    
    public static function values(): array
    {
        return [
            self::PENDING,
            self::IN_PROGRESS,
            self::COMPLETED,
        ];
    }

}
