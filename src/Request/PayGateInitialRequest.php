<?php

namespace rainwaves\PaygatePayment\Request;

use rainwaves\PaygatePayment\Abstraction\Arrayable;
use rainwaves\PaygatePayment\Entities\AmountConverterTrait;
use rainwaves\PaygatePayment\Entities\PayGateProperties;

class PayGateInitialRequest extends Arrayable
{
    use AmountConverterTrait, PayGateProperties;

    private string $payGateInitialUrl = 'https://secure.paygate.co.za/payweb3/initiate.trans';

    public string $reference;
    public float $amount;
    public string $currency;
    public string $returnUrl;

    public string $notifyUrl;

    public string $transactionDate;
    public string $locale;
    public string $country;
    public string $email;

    public static function inputRequest(array $input): PayGateInitialRequest
    {
        $input = (object)$input;

        $self = new self();
        $self->payGateId = $input->payGateId;
        $self->payGateSecret = $input->payGateSecret;
        $self->reference = $input->reference;
        $self->currency = $input->currency;
        $self->returnUrl = $input->returnUrl;
        $self->transactionDate = $input->transactionDate;
        $self->locale = $input->locale;
        $self->amount = $self->amountInCents($input->amount);
        $self->country = $input->country;
        $self->notifyUrl = $input->notifyUrl;
        $self->email = $input->email;

        return $self;
    }

    public function getPayGateID(): string
    {
        return $this->payGateId;
    }

}