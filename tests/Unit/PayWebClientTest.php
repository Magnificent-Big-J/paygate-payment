<?php

namespace rainwaves\PaygatePayment\Tests;

use DateTime;
use Orchestra\Testbench\TestCase;
use rainwaves\PaygatePayment\Client\PayWebClient;
use rainwaves\PaygatePayment\Response\InitialResponse;

class PayWebClientTest extends TestCase
{
    protected PayWebClient $client;
    protected string $payGateId = '10011072130';
    protected string $encryption = 'secret';

    protected function setUp(): void
    {
        parent::setUp();
        $this->client =  new PayWebClient($this->payGateId, $this->encryption);
    }

    /**
     * @test
     */
    public function testInitiatePaymentReturnsInitialResponse()
    {
        $response = $this->client->initiatePayment($this->inputData());

        $this->assertInstanceOf(InitialResponse::class, $response);
        $this->assertNotEmpty($response->payRequestId);
        $this->assertNotEmpty($response->checkSum);
    }

    /**
     * @test
     */
    public function testCreateFormThrowsExceptionIfInitialResponseNotAvailable()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Initial response not available. Call the initiatePayment method first.');

        $this->client->createForm();
    }

    /**
     * @test
     */
    public function testCreateFormReturnsFormHtmlString()
    {

        $this->client->initiatePayment($this->inputData());

        $formHtml = $this->client->createForm();

        $this->assertIsString($formHtml);
        $this->assertNotEmpty($formHtml);
    }

    protected function inputData(): array
    {
        $DateTime = new DateTime();

        return [
            'reference'         => 'order_123',
            'amount'            => 32.99,
            'currency'          => 'ZAR',
            'returnUrl'        => 'https://my.return.url/page',
            'notifyUrl'        => 'https://my.notify.url/page',
            'transactionDate'  => $DateTime->format('Y-m-d H:i:s'),
            'locale'            => 'en-za',
            'country'           => 'ZAF',
            'email'             => 'customer@paygate.co.za',
        ];
    }
}