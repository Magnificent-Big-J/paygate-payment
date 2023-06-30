<?php

namespace rainwaves\PaygatePayment\Model;

class Status
{
    public const PAYMENT_NOT_DONE = 0;
    public const PAYMENT_APPROVED = 1;
    public const PAYMENT_DECLINED = 2;
    public const PAYMENT_CANCELLED = 3;
    public const PAYMENT_USER_CALLED = 4;
    public const PAYMENT_RECEIVED_BY_PAYGATE = 5;
    public const PAYMENT_SETTLEMENT_VOIDED = 7;

    public static array $paymentTexts = [
        self::PAYMENT_NOT_DONE => 'Not Done',
        self::PAYMENT_APPROVED => 'Approved',
        self::PAYMENT_DECLINED => 'Declined',
        self::PAYMENT_CANCELLED => 'Cancelled',
        self::PAYMENT_USER_CALLED => 'User Cancelled',
        self::PAYMENT_RECEIVED_BY_PAYGATE => 'Received by PayGate',
        self::PAYMENT_SETTLEMENT_VOIDED => 'Settlement Voided',
    ];

    public function getStatusText(int $status)
    {
        return self::$paymentTexts[$status];
    }
}