<?php

namespace rainwaves\PaygatePayment;

use Illuminate\Support\ServiceProvider;
use rainwaves\PaygatePayment\Client\PayWebClient;
use rainwaves\PaygatePayment\Contracts\PayWebInterface;

class PayGateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PayWebInterface::class, function ($app) {
            $payGateId = config('paygate.paygate_id');
            $payGateSecret = config('paygate.paygate_secret');
            return new PayWebClient($payGateId, $payGateSecret);
        });
    }
}