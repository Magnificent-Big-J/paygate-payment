<?php

namespace rainwaves\PaygatePayment\Model;

class CreditCardCode
{
    public const APPROVAL = 900001;
    public const CARD_EXPIRED = 900002;
    public const INSUFFICIENT = 900003;
    public const INVALID_CARD_NUMBER = 900004;
    public const BANK_INTERFACE = 900005;
    public const INVALID_CARD = 900006;
    public const DECLINED = 900007;
    public const LOST_CARD = 900009;
    public const INVALID_CARD_LENGTH = 900010;
    public const SUSPECTED_CARD = 900011;
    public const CARD_REPORTED_STOLEN = 900012;
    public const RESTRICTED_CARD = 900013;
    public const EXCESSIVE_CARD_USAGE = 900014;
    public const CARD_BLACKLISTED = 900015;
    public const AUTH_ISSUE = 900207;
    public const AUTH_DECLINED = 990020;
    public const LOOKUP_TIMEOUT = 900210;
    public const INVALID_EXPIRY_DATE = 991001;
    public const INVALID_AMOUNT = 991002;

    public static array $creditCardCodeTexts = [
        self::APPROVAL => 'Call for Approval',
        self::CARD_EXPIRED => 'Card Expired',
        self::INSUFFICIENT => 'Insufficient Funds',
        self::INVALID_CARD_NUMBER => 'Invalid Card Number',
        self::BANK_INTERFACE => 'Indicates a communications failure between the banks systems',
        self::INVALID_CARD => 'Invalid Card',
        self::DECLINED => 'Declined',
        self::LOST_CARD => 'Lost Card',
        self::INVALID_CARD_LENGTH => 'Invalid Card Length',
        self::SUSPECTED_CARD => 'Suspected Fraud',
        self::CARD_REPORTED_STOLEN => 'Card Reported as Stolen',
        self::RESTRICTED_CARD => 'Restricted Card',
        self::EXCESSIVE_CARD_USAGE => 'Excessive Card Usage',
        self::CARD_BLACKLISTED => 'Card Blacklisted',
        self::AUTH_ISSUE => 'Declined; authentication failed',
        self::AUTH_DECLINED => 'Auth Declined',
        self::LOOKUP_TIMEOUT => '3D Secure Lookup Timeout',
        self::INVALID_EXPIRY_DATE => 'Invalid expiry date',
        self::INVALID_AMOUNT => 'Invalid Amount',
    ];

    public static function getCreditCardCodeText(int $code): string
    {
        return self::$creditCardCodeTexts[$code];
    }
}