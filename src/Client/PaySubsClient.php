<?php

namespace rainwaves\PaygatePayment\Client;

use rainwaves\PaygatePayment\Contracts\PaySubsInterface;
use rainwaves\PaygatePayment\Entities\CheckSumTrait;
use rainwaves\PaygatePayment\Form\FormBuilder;
use rainwaves\PaygatePayment\Model\PaymentURL;
use rainwaves\PaygatePayment\Model\Sequence;
use rainwaves\PaygatePayment\Request\PaySubsRequest;
use rainwaves\PaygatePayment\Validation\PaySubsValidation;

class PaySubsClient implements PaySubsInterface
{
    use CheckSumTrait;
    private string $payGateId;
    private string $encryption;

    private ?array $inputData;
    public function __construct(string $payGateId, string $encryption)
    {
        $this->payGateId = $payGateId;
        $this->encryption = $encryption;
    }
    public function createSubscription(array $input): array
    {
        PaySubsValidation::validate($input);
        $this->inputData = array_merge($input, ['payGateId' => $this->payGateId]);
        $request = PaySubsRequest::inputRequest($this->inputData);
        $this->inputData = $request->toArray();
        $this->inputData = Sequence::order($this->inputData, Sequence::PAY_SUBS);
        $checkSum = $this->paySubsCheckSum($this->inputData, $this->encryption,'|');
        $this->inputData['CHECKSUM'] = $checkSum;
        return $this->inputData;
    }

    public function createSubscriptionAndChain(array $input): PaySubsClient
    {
        $this->createSubscription($input);
        return $this;
    }

    public function createForm(): string
    {
        if (!isset($this->inputData)) {
            throw new \RuntimeException('Subscription data is not provided!');
        }

        return FormBuilder::buildForm($this->inputData, PaymentURL::PAY_SUBS_PROCESS_URL);
    }
}