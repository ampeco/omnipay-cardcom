<?php

namespace Ampeco\OmnipayCardcom\Message;

class FetchTransactionRequest extends AbstractRequest
{

    public function getEndpoint()
    {
        return '/api/v11/Transactions/GetTransactionInfoById';
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
          'TerminalNumber' => $this->gateway->getTerminalId(),
           'UserName' => $this->gateway->getApiName(),
           'UserPassword' => $this->gateway->getApiPassword(),
           'internalDealNumber' => $this->getTransactionReference(),
        ];
    }

    public function createResponse($data, $statusCode): Response
    {
        return $this->response = new FetchTransactionResponse($this, $data, $statusCode);
    }
}
