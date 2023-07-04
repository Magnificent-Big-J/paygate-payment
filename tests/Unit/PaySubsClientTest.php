<?php

namespace rainwaves\PaygatePayment\Tests;

use Orchestra\Testbench\TestCase;
use rainwaves\PaygatePayment\Client\PaySubsClient;

class PaySubsClientTest extends TestCase
{
    protected string $payGateId = '10011072130';
    protected string $encryption = 'secret';

    protected PaySubsClient $paySubsClient;
    protected function setUp(): void
    {
        $this->paySubsClient = new PaySubsClient($this->payGateId, $this->encryption);
        parent::setUp();
    }
    /**
     * @test
     */
    public function testCreateSubscription()
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

        $subscriptionData = $this->paySubsClient->createSubscription($inputData);
        $this->assertArrayHasKey('CHECKSUM', $subscriptionData);
        $this->assertEquals($this->payGateId, $subscriptionData['PAYGATE_ID']);
    }

    /**
     * @test
     */
    public function testCreateFormWithoutSubscriptionData()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Subscription data is not provided!');
        $this->paySubsClient->createForm();
    }
}