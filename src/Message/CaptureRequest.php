<?php

namespace Ampeco\OmnipayCardcom\Message;

class CaptureRequest extends AbstractRequest
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
            'TerminalNumber' => $this->gateway->getTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'Token' => $this->getToken(),
            'CardExpirationMMYY' => $this->getExpiration(),
            'Amount' => $this->getAmount(),
            'ExternalUniqTranId' => $this->getTransactionId(),
            'Advanced' => [
                'ApprovalNumber' => $this->getTransactionReference()
            ]
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new Response($this, $data, $statusCode);
    }
}
