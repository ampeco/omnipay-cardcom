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
            'TerminalNumber' => $this->gateway->getHoldTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'Amount' => $this->getAmount(),
            'SuccessRedirectUrl' => $this->getReturnUrl(),
            'FailedRedirectUrl' => $this->getReturnUrl(),
            'Operation' => 'ChargeAndCreateToken',
            'ProductName' => 'Tokenization',
            'Advanced' => [
                'JValidateType' => 5
            ]
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CreateCardResponse($this, $data, $statusCode);
    }
}
