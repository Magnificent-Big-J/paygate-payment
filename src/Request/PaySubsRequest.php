<?php

namespace rainwaves\PaygatePayment\Request;

use rainwaves\PaygatePayment\Abstraction\Arrayable;
use rainwaves\PaygatePayment\Entities\AmountConverterTrait;
use rainwaves\PaygatePayment\Entities\PayGateProperties;

class PaySubsRequest  extends Arrayable
{
    use AmountConverterTrait, PayGateProperties;
    public int $version = 21;
    public string $reference;
    public int $amount;
    public string $currency;
    public string $returnUrl;
    public string $transactionDate;
    public string $subsStartDate;
    public string $subsEndDate;
    public string $subsFrequency;
    public string $processNow;
    public string $processNowAmount;
    public string $paygateId;

    public static function inputRequest(array $input): PaySubsRequest
    {
        $input = (object) $input;

        $self = new self();
        $self->paygateId = $input->payGateId;
        $self->reference = $input->reference;
        $self->amount = $self->amountInCents($input->amount);
        $self->currency = $input->currency;
        $self->returnUrl = $input->returnUrl;
        $self->transactionDate = $input->transactionDate;
        $self->subsStartDate = $input->subsStartDate;
        $self->subsEndDate = $input->subsEndDate;
        $self->subsFrequency = $input->subsFrequency;
        $self->processNow = $input->processNow;
        $self->processNowAmount =  $self->amountInCents($input->processNowAmount);

        return $self;
    }
}