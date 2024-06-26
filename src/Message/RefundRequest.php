<?php

namespace Ampeco\OmnipayCardcom\Message;

class RefundRequest extends AbstractRequest
{

    public function getEndpoint()
    {
        return '/api/v11/Transactions/RefundByTransactionId';
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'ApiName' => $this->gateway->getApiName(),
            'ApiPassword' => $this->gateway->getApiPassword(),
            'TransactionId' => $this->getTransactionId(),
            'CancelOnly' => true,
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new Response($this, $data, $statusCode);
    }
}
