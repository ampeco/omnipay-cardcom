<?php

namespace Ampeco\OmnipayCardcom\Message;

class CreateCardRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return '/api/v11/LowProfile/Create';
    }

    public function getData()
    {
        return [
            'TerminalNumber' => $this->gateway->getTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'Amount' => $this->getAmount(),
            'SuccessRedirectUrl' => $this->getReturnUrl(),
            'FailedRedirectUrl' => $this->getReturnUrl(),
            'Operation' => 'CreateTokenOnly',
            'ProductName' => 'Tokenization',
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CreateCardResponse($this, $data, $statusCode);
    }
}
