<?php

namespace rainwaves\PaygatePayment\Entities;

trait CheckSumTrait
{
    public function payWebCheckSum(array $data, string $encryption): string
    {
        return md5(implode('', $data) . $encryption);
    }

    public function paySubsCheckSum(array $data, string $encryption): string
    {
       return  md5(implode('|', $data) . '|' . $encryption);
    }
}