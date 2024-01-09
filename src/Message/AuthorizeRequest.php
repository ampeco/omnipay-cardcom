<?php

namespace Ampeco\OmnipayCardcom\Message;

class AuthorizeRequest extends AbstractRequest
{

    public function getEndpoint(): string
    {
        return '/api/v11/Transactions/Transaction';
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'TerminalNumber' => $this->gateway->getHoldTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'Token' => $this->getToken(),
            'CardExpirationMMYY' => $this->getExpiration(),
            'Amount' => $this->getAmount(),
            'ExternalUniqTranId' => $this->getTransactionId(),
            'Advanced' => [
                'JValidateType' => 5 // for authorize
            ]
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new AuthorizeResponse($this, $data, $statusCode);
    }
}
