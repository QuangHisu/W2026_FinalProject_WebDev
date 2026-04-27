<?php

namespace App\Enum;

enum Status: string
{
    case CREATED = 'created';
    case IN_TRANSIT = 'in_transit';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
}

