<?php

namespace rainwaves\PaygatePayment;

use rainwaves\PaygatePayment\Client\PaySubsClient;
use rainwaves\PaygatePayment\Contracts\PaySubsInterface;

class PaySubs implements PaySubsInterface
{
    private PaySubsClient $paySubsClient;

    public function __construct(string $payGateId, string $encryption)
    {
        $this->paySubsClient = new PaySubsClient($payGateId, $encryption);
    }

    public function createSubscription(array $input): array
    {
        return $this->paySubsClient->createSubscription($input);
    }

    public function createSubscriptionAndChain(array $input): PaySubsClient
    {
        $this->paySubsClient->createSubscriptionAndChain($input);
        return  $this->paySubsClient;
    }

    public function createForm(): string
    {
        return $this->paySubsClient->createForm();
    }

}