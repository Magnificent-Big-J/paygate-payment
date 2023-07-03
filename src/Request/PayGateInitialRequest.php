<?php

namespace rainwaves\PaygatePayment\Request;

use rainwaves\PaygatePayment\Abstraction\Arrayable;
use rainwaves\PaygatePayment\Entities\AmountConverterTrait;
class PayGateInitialRequest extends Arrayable
{
    use AmountConverterTrait;

    public string $paygateId;
    public string $reference;
    public int $amount;
    public string $currency;
    public string $returnUrl;
    public string $transactionDate;
    public string $locale;
    public string $country;
    public string $email;

    public string $notifyUrl;

    public static function inputRequest(array $input): PayGateInitialRequest
    {
        $input = (object)$input;
        $self = new self();
        $self->paygateId = $input->payGateId;
        $self->reference = $input->reference;
        $self->amount = $self->amountInCents($input->amount);
        $self->currency = $input->currency;
        $self->returnUrl = $input->returnUrl;
        $self->notifyUrl = $input->notifyUrl;
        $self->transactionDate = $input->transactionDate;
        $self->locale = $input->locale;
        $self->country = $input->country;
        $self->email = $input->email;
        return $self;
    }
}