<?php

namespace rainwaves\PaygatePayment\Entities;

trait AmountConverterTrait
{
    private function amountInCents(float $amount): int
    {
        return intval($amount * 100);
    }
}