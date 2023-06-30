<?php

namespace rainwaves\PaygatePayment\Response;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class PayGateValidation
{
    public static function validate(array $input): void
    {
        try {
            v::key('payGateId', v::notEmpty())
                ->key('payGateSecret', v::notEmpty())
                ->key('reference', v::notEmpty())
                ->key('currency', v::notEmpty())
                ->key('returnUrl', v::notEmpty())
                ->key('transactionDate', v::notEmpty())
                ->key('locale', v::notEmpty())
                ->key('amount', v::notEmpty())
                ->key('country', v::notEmpty())
                ->key('notifyUrl', v::notEmpty())
                ->key('email', v::notEmpty())
                ->assert($input);
        } catch (NestedValidationException $e) {
            $errors = $e->getMessages();
            throw new \InvalidArgumentException('Invalid input data: ' . implode(' ', $errors));
        }
    }
}