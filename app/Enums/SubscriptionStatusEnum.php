<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SubscriptionStatusEnum extends Enum
{
    const VALID = 'valid';
    const EXPIRED = 'expired';
    const CANCELLED = 'cancelled';
}
