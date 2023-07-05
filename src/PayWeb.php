<?php

namespace rainwaves\PaygatePayment;

use rainwaves\PaygatePayment\Client\PayWebClient;
use rainwaves\PaygatePayment\Contracts\PayWebInterface;
use rainwaves\PaygatePayment\Response\InitialResponse;

class PayWeb implements PayWebInterface
{
    private PayWebClient $payWebClient;

    public function __construct(string $payGateId, string $encryption)
    {
        $this->payWebClient = new PayWebClient($payGateId, $encryption);
    }

    public function initiatePayment(array $inputData): InitialResponse
    {
        return $this->payWebClient->initiatePayment($inputData);
    }

    public function createForm(): string
    {
        return $this->payWebClient->createForm();
    }

    public function initiatePaymentAndChain(array $inputData): PayWebClient
    {
        $this->payWebClient->initiatePaymentAndChain($inputData);
        return $this->payWebClient;
    }
}