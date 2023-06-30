<?php

namespace rainwaves\PaygatePayment\Response;

class PayGateRedirectResponse
{
    public string $payRequestID;
    public string $transactionStatus;

    public string $checkSum;

    public function __construct(array $response)
    {
        $response = (object)$response;

        $this->payRequestID = $response->PAY_REQUEST_ID;
        $this->transactionStatus = $response->TRANSACTION_STATUS;
        $this->checkSum = $response->CHECKSUM;
    }
}