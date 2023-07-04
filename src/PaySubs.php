<?php

namespace rainwaves\PaygatePayment\PaySubs;

use rainwaves\PaygatePayment\Client\PaySubsClient;

class PaySubs
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
        return  $this;
    }

    public function createForm(): string
    {
        return $this->paySubsClient->createForm();
    }

}