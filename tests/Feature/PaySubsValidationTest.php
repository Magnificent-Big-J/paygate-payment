<?php

namespace rainwaves\PaygatePayment\Feature;

use Orchestra\Testbench\TestCase;
use rainwaves\PaygatePayment\Validation\PaySubsValidation;

class PaySubsValidationTest extends TestCase
{
    /**
     * @test
     */
    public function testValidInputData()
    {
        $inputData = [
            'reference' => 'order_123',
            'amount' => 100.00,
            'currency' => 'USD',
            'returnUrl' => 'https://example.com/return',
            'transactionDate' => '2023-06-29',
            'subsStartDate' => '2023-07-01',
            'subsEndDate' => '2023-12-31',
            'subsFrequency' => 'MONTHLY',
            'processNow' => 'YES',
            'processNowAmount' => 50.00,
        ];

        try {
            PaySubsValidation::validate($inputData);
            $this->assertTrue(true); // Validation passed
        } catch (\InvalidArgumentException $e) {
            $this->fail('Validation failed: ' . $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function testInvalidInputData()
    {
        $inputData = [
            'reference' => 'order_123',
            'amount' => 100.00,
            'currency' => 'USD',
            'returnUrl' => 'https://example.com/return',
            'transactionDate' => '2023-06-29',
            'subsStartDate' => '2023-07-01',
            'subsEndDate' => '2023-06-30', // Invalid: end date is before start date
            'subsFrequency' => 'MONTHLY',
            'processNow' => 'YES',
            'processNowAmount' => 50.00,
        ];

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid input data');

        PaySubsValidation::validate($inputData);
    }
}