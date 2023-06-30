<?php

namespace rainwaves\PaygatePayment\Response;

class InitialResponse
{
    public string $checkSum;
    public string $payRequestID;
    public string $paygateID;
    public string $reference;

    public function __construct(array $response)
    {
        $response = (object)$response;

        $this->payRequestID = $response->PAY_REQUEST_ID;
        $this->checkSum = $response->CHECKSUM;
        $this->reference = $response->REFERENCE;
        $this->paygateID = $response->PAYGATE_ID;

    }
}