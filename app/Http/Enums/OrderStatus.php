<?php

namespace App\Http\Enums;

enum OrderStatus: string
{
    case waiting = 'WAITING';
    case paid = 'PAID';
    case rejected = 'REJECTED';
}
