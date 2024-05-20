<?php

namespace Ampeco\OmnipayCardcom\Message;

class GetTokenRequest extends AbstractRequest
{

    public function getEndpoint()
    {
        return '/api/v11/LowProfile/GetLpResult';
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'TerminalNumber' => $this->gateway->getHoldTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'LowProfileId' => $this->getTransactionReference(),
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new GetTokenResponse($this, $data, $statusCode);
    }

}
