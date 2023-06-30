<?php

namespace rainwaves\PaygatePayment\Response;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class PaySubsValidation
{
    public static function validate(array $input): void
    {
        try {
            v::key('payGateId', v::notEmpty())
                ->key('payGateSecret', v::notEmpty())
                ->key('version', v::notEmpty())
                ->key('reference', v::notEmpty())
                ->key('amount', v::notEmpty())
                ->key('currency', v::notEmpty())
                ->key('returnUrl', v::notEmpty())
                ->key('transactionDate', v::notEmpty())
                ->key('subsStartDate', v::notEmpty())
                ->key('subsEndDate', v::notEmpty())
                ->key('subsFrequency', v::notEmpty())
                ->key('processNow', v::notEmpty())
                ->key('processNowAmount')
                ->key('checksum', v::notEmpty())
                ->assert($input);
        } catch (NestedValidationException $e) {
            $errors = $e->getMessages();
            throw new \InvalidArgumentException('Invalid input data: ' . implode(' ', $errors));
        }
    }
}