<?php

namespace rainwaves\PaygatePayment\Response;

class PayGateNotifyResponse
{
    public string $payGateID;
    public string $payRequestID;
    public string $reference;
    public int $transactionStatus;
    public int $resultCode;
    public string $authCode;
    public string $currency;
    public int $amount;
    public int $resultDesc;
    public int $transactionID;
    public string $riskIndicator;
    public string $payMethod;
    public string $payMethodDetail;
    public string $user1;
    public string $user2;
    public string $user3;
    public string $validID;
    public string $payVaultData1;
    public string $payVaultData2;
    public string $checkSum;

    public function __construct(array $response)
    {
        $response = (object) $response;

        $this->payGateID = $response->PAYGATE_ID;
        $this->payRequestID = $response->PAY_REQUEST_ID;
        $this->reference = $response->REFERENCE;
        $this->transactionStatus = $response->TRANSACTION_STATUS;
        $this->resultCode = $response->RESULT_CODE;
        $this->authCode = $response->AUTH_CODE;
        $this->currency = $response->CURRENCY;
        $this->amount = $response->AMOUNT;
        $this->resultDesc = $response->RESULT_DESC;
        $this->transactionID = $response->TRANSACTION_ID;
        $this->riskIndicator = $response->RISK_INDICATOR;
        $this->payMethod = $response->PAY_METHOD;
        $this->payMethodDetail = $response->PAY_METHOD_DETAIL;
        $this->user1 = $response->USER1;
        $this->user2 = $response->USER2;
        $this->user3 = $response->USER3;
        $this->validID = $response->VAULT_ID;
        $this->payVaultData1 = $response->PAYVAULT_DATA_1;
        $this->payVaultData2 = $response->PAYVAULT_DATA_2;
        $this->checkSum = $response->CHECKSUM;
    }

}