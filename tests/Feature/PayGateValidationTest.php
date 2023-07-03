<?php

namespace rainwaves\PaygatePayment\Feature;

use DateTime;
use Orchestra\Testbench\TestCase;
use rainwaves\PaygatePayment\Validation\PayGateValidation;

class PayGateValidationTest extends TestCase
{
    /**
     * @test
     */
    public function testValidateMissingPayGateId(): void
    {
        $input = $this->inputData();
        unset($input['payGateId']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: payGateId must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingReference()
    {
        $input = $this->inputData();
        unset($input['reference']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: reference must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingAmount()
    {
        $input = $this->inputData();
        unset($input['amount']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: amount must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingCurrency()
    {
        $input = $this->inputData();
        unset($input['currency']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: currency must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingReturnUrl()
    {
        $input = $this->inputData();
        unset($input['returnUrl']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: returnUrl must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingNotifyUrl()
    {
        $input = $this->inputData();
        unset($input['notifyUrl']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: notifyUrl must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingTransactionDate()
    {
        $input = $this->inputData();
        unset($input['transactionDate']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: transactionDate must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingLocale()
    {
        $input = $this->inputData();
        unset($input['locale']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: locale must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingCountry()
    {
        $input = $this->inputData();
        unset($input['country']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: country must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingEmail()
    {
        $input = $this->inputData();
        unset($input['email']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: email must be present');

        PayGateValidation::validate($input);
    }

    /**
     * @test
     */
    public function testValidateMissingPayGateSecret()
    {
        $input = $this->inputData();
        unset($input['payGateSecret']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data: payGateSecret must be present');

        PayGateValidation::validate($input);
    }

    protected function inputData(): array
    {
        $DateTime = new DateTime();

        return [
            'payGateId'        => 10011072130,
            'reference'         => 'pgtest_123456789',
            'amount'            => 32.99,
            'currency'          => 'ZAR',
            'returnUrl'        => 'https://my.return.url/page',
            'notifyUrl'        => 'https://my.notify.url/page',
            'transactionDate'  => $DateTime->format('Y-m-d H:i:s'),
            'locale'            => 'en-za',
            'country'           => 'ZAF',
            'email'             => 'customer@paygate.co.za',
            'payGateSecret'     => 'secret',
        ];
    }
}