<?php

namespace rainwaves\PaygatePayment\Contracts;

use rainwaves\PaygatePayment\Response\InitialResponse;

interface PayWebInterface
{
    public function initiatePayment(array $inputData):InitialResponse;
}