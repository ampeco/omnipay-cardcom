<?php

namespace Ampeco\OmnipayCardcom\Message;

class CreateCardRequest extends AbstractRequest
{
    protected int $terminalId;

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
            'FailureRedirectUrl' => $this->getReturnUrl(),
            'WebhookUrl' => $this->getNotifyUrl(),
        ];
    }

    //TODO: implement this method
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CreateCardResponse($this, $data, $statusCode);
    }
}
