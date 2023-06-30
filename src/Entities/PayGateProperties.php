<?php

namespace rainwaves\PaygatePayment\Entities;

trait PayGateProperties
{
    protected string $payGateId;
    protected string $payGateSecret;

    public function getPayGateId(): string
    {
        return $this->payGateId;
    }

    public function getPayGateSecret(): string
    {
        return $this->payGateSecret;
    }
}