<?php

namespace rainwaves\PaygatePayment\Request;

use rainwaves\PaygatePayment\Abstraction\Arrayable;
use rainwaves\PaygatePayment\Response\InitialResponse;

class PayGateQueryRequest extends Arrayable
{
    public InitialResponse $initialResponse;

    public function __construct(InitialResponse $response)
    {
        $this->initialResponse = $response;
    }
}