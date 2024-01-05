<?php

namespace Ampeco\OmnipayCardcom\Message;

class CreateCardRequest extends AbstractRequest
{
    protected int $terminalId;
    //TODO Fix this
    private int $isoCoinId = 2;
    public function getEndpoint()
    {
        return '/api/v11/LowProfile/Create';
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getData()
    {
        return [
            'TerminalNumber' => $this->gateway->getTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'Amount' => $this->getAmount(),
            'SuccessRedirectUrl' => $this->getReturnUrl(),
            'FailedRedirectUrl' => $this->getReturnUrl(),
            //TODO should we need webhook url?
            'WebhookUrl' => $this->getReturnUrl(),
            'Operation' => 'CreateTokenOnly',
            'ProductName' => 'Tokenization',
            'IsoCoinId' => $this->isoCoinId,
            //TODO remove the Language parameter
            'Language' => 'en',
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CreateCardResponse($this, $data, $statusCode);
    }
}
