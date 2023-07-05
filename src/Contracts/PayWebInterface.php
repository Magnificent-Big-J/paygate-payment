<?php

namespace rainwaves\PaygatePayment\Contracts;

use rainwaves\PaygatePayment\Client\PayWebClient;
use rainwaves\PaygatePayment\Response\InitialResponse;

interface PayWebInterface extends FormInterface
{
    public function initiatePayment(array $inputData): InitialResponse;
    public function initiatePaymentAndChain(array $inputData): PayWebClient;
}