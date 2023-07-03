<?php

namespace rainwaves\PaygatePayment;

use rainwaves\PaygatePayment\Client\PayWebClient;
use rainwaves\PaygatePayment\Response\InitialResponse;

class PayWeb
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

    public function initiatePaymentAndChain(array $inputData): self
    {
        $this->payWebClient->initiatePaymentAndChain($inputData);
        return $this;
    }

}