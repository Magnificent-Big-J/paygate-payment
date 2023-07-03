<?php

namespace rainwaves\PaygatePayment\Response;

use rainwaves\PaygatePayment\Abstraction\Arrayable;

class InitialResponse extends Arrayable
{
    public string $checkSum;
    public string $payRequestId;
    public string $paygateId;
    public string $reference;

    public function __construct(array $response)
    {
        $response = (object)$response;

        $this->payRequestId = $response->PAY_REQUEST_ID;
        $this->checkSum = $response->CHECKSUM;
        $this->reference = $response->REFERENCE;
        $this->paygateId = $response->PAYGATE_ID;

    }
}