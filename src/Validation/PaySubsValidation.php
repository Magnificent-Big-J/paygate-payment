<?php

namespace rainwaves\PaygatePayment\Validation;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class PaySubsValidation
{
    public static function validate(array $input): void
    {
        try {
            v::key('reference', v::notEmpty())
                ->key('amount', v::notEmpty())
                ->key('currency', v::notEmpty())
                ->key('returnUrl', v::notEmpty())
                ->key('transactionDate', v::notEmpty())
                ->key('subsStartDate', v::notEmpty()->date())
                ->key('subsEndDate', v::notEmpty()->date()->min($input['subsStartDate']))
                ->key('subsFrequency', v::notEmpty())
                ->key('processNow', v::notEmpty())
                ->key('processNowAmount')
                ->assert($input);
        } catch (NestedValidationException $e) {
            $errors = $e->getMessages();
            throw new \InvalidArgumentException('Invalid input data: ' . implode(' ', $errors));
        }
    }
}