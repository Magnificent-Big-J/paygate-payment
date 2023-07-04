<?php

namespace rainwaves\PaygatePayment\Contracts;

use rainwaves\PaygatePayment\Client\PaySubsClient;

interface PaySubsInterface
{
    public function createSubscription(array $input): array;
    public function createSubscriptionAndChain(array $input): PaySubsClient;

}