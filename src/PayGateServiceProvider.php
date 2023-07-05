<?php

namespace rainwaves\PaygatePayment;

use Illuminate\Support\ServiceProvider;
use rainwaves\PaygatePayment\Client\PayWebClient;
use rainwaves\PaygatePayment\Contracts\PaySubsInterface;
use rainwaves\PaygatePayment\Contracts\PayWebInterface;

class PayGateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->publishes([
            __DIR__.'/../config/paygate.php' => config_path('paygate.php'),
        ], 'paygate-config');

        $this->app->bind(PayWebInterface::class, function ($app) {
            $payGateId = config('paygate.paygate_id');
            $payGateSecret = config('paygate.paygate_secret');
            return new PayWeb($payGateId, $payGateSecret);
        });

        $this->app->bind(PaySubsInterface::class, function ($app) {
            $payGateId = config('paygate.paygate_id');
            $payGateSecret = config('paygate.paygate_secret');
            return new PayWebClient($payGateId, $payGateSecret);
        });
    }
}