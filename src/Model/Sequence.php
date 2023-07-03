<?php

namespace rainwaves\PaygatePayment\Model;

class Sequence
{
    protected const SEQUENCE_ORDERS = [
        'payweb' => [
            'PAYGATE_ID',
            'REFERENCE',
            'AMOUNT',
            'CURRENCY',
            'RETURN_URL',
            'TRANSACTION_DATE',
            'LOCALE',
            'COUNTRY',
            'EMAIL',
            'NOTIFY_URL'
        ],
        'paysubs' => [
            'VERSION',
            'PAYGATE_ID',
            'REFERENCE',
            'AMOUNT',
            'CURRENCY',
            'RETURN_URL',
            'TRANSACTION_DATE',
            'SUBS_START_DATE',
            'SUBS_END_DATE',
            'SUBS_FREQUENCY',
            'PROCESS_NOW',
            'PROCESS_NOW_AMOUNT',
            'NOTIFY_URL',
        ],
        // Add more sequence types here...
    ];

    public static function order(array $input, string $sequenceType): array
    {
        $sequence = self::getSequenceByType($sequenceType);
        return self::correctSequence($input, $sequence);
    }

    private static function getSequenceByType(string $sequenceType): array
    {
        if (!array_key_exists($sequenceType, self::SEQUENCE_ORDERS)) {
            throw new \InvalidArgumentException('Invalid sequence type.');
        }

        return self::SEQUENCE_ORDERS[$sequenceType];
    }

    private static function correctSequence(array $input, array $sequence): array
    {
        uksort($input, function ($a, $b) use ($sequence) {
            $posA = array_search($a, $sequence);
            $posB = array_search($b, $sequence);
            return $posA <=> $posB;
        });

        return $input;
    }
}
