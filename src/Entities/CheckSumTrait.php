<?php

namespace rainwaves\PaygatePayment\Entities;

trait CheckSumTrait
{
    public function generateCheckSum(array $data, string $encryption): string
    {
        return md5(implode('', $data) . $encryption);
    }
}