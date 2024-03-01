<?php

namespace Ampeco\OmnipayCardcom\Message;

class VoidRequest extends AbstractRequest
{

    public function getEndpoint()
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
            'ExternalUniqTranId' => $this->getTransactionId(),
            'Advanced' => [
                'ApprovalNumber' => $this->getTransactionReference(),
                'MTI' => 420 // for void
            ]
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new VoidResponse($this, $data, $statusCode);
    }
}
