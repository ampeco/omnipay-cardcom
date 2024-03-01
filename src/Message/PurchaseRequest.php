<?php

namespace Ampeco\OmnipayCardcom\Message;

class PurchaseRequest extends AbstractRequest
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
            'Amount' => $this->getAmount(),
            'ExternalUniqTranId' => $this->getTransactionId(),
            'Document' => $this->getDocument(),
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new Response($this, $data, $statusCode);
    }
}
