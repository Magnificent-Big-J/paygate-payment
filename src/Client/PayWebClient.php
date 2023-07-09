<?php

namespace rainwaves\PaygatePayment\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use rainwaves\PaygatePayment\Contracts\PayWebInterface;
use rainwaves\PaygatePayment\Entities\CheckSumTrait;
use rainwaves\PaygatePayment\Form\FormBuilder;
use rainwaves\PaygatePayment\Model\PaymentURL;
use rainwaves\PaygatePayment\Model\Sequence;
use rainwaves\PaygatePayment\Request\PayGateInitialRequest;
use rainwaves\PaygatePayment\Response\InitialResponse;
use rainwaves\PaygatePayment\Validation\PayGateValidation;

class PayWebClient implements PayWebInterface
{
    use CheckSumTrait;
    private string $payGateId;
    private string $encryption;
    private ?InitialResponse $initialResponse;

    public function __construct(string $payGateId, string $encryption)
    {
        $this->payGateId = $payGateId;
        $this->encryption = $encryption;
        $this->initialResponse = null;
    }

    public function initiatePayment(array $inputData): InitialResponse
    {
        $inputData = array_merge($inputData, ['payGateId' => $this->payGateId]);
        PayGateValidation::validate($inputData);
        $request = PayGateInitialRequest::inputRequest($inputData);
        $checkSum = $this->payWebCheckSum($request->toArray(), $this->encryption,'');
        $requestData = array_merge($request->toArray(), ['CHECKSUM' => $checkSum]);
        $response = $this->sendPostRequest(PaymentURL::PAY_WEB_INITIAL_URL, Sequence::order($requestData, Sequence::PAY_WEB));
        parse_str($response->getBody()->getContents(), $responseData);

        $this->initialResponse = new InitialResponse($responseData);

        return $this->initialResponse;
    }

    public function createForm(): string
    {
        if (!$this->initialResponse) {
            throw new \RuntimeException('Initial response not available. Call the initiatePayment method first.');
        }

        $formFields = [
            'PAY_REQUEST_ID' => $this->initialResponse->payRequestId,
            'CHECKSUM' => $this->initialResponse->checkSum,
        ];
        return FormBuilder::buildForm($formFields, PaymentURL::PAY_WEB_PROCESS_URL);
    }

    public function initiatePaymentAndChain(array $inputData): self
    {
        $this->initiatePayment($inputData);
        return $this;
    }

    private function sendPostRequest(string $url, array $data): ResponseInterface
    {
        $client = new Client();

        try {
            $response = $client->post($url, ['form_params' => $data]);
        } catch (GuzzleException $e) {
            throw new \RuntimeException('Failed to send POST request to ' . $url . ': ' . $e->getMessage());
        }

        return $response;
    }
    public function getInitialResponse(): ?InitialResponse
    {
        return $this->initialResponse;
    }
}
