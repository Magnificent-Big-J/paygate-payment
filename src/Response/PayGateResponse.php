<?php

namespace rainwaves\PaygatePayment\Response;

use rainwaves\PaygatePayment\Model\Status;

class PayGateResponse
{
    private bool $success;
    private string $message;
    private int $transactionId;

    public function __construct(PayGateNotifyResponse $response)
    {
        $this->transactionId = $response->transactionID;
        $this->success = Status::PAYMENT_APPROVED === $this->transactionId;
        $this->message = Status::getStatusText($this->transactionId);
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }
}