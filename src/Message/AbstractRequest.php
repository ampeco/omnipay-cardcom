<?php

namespace Ampeco\OmnipayCardcom\Message;

use Ampeco\OmnipayCardcom\Gateway;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

abstract class AbstractRequest extends BaseAbstractRequest
{
    protected ?Gateway $gateway;

    abstract public function getEndpoint();

    public function setGateway(Gateway $gateway): static
    {
        $this->gateway = $gateway;

        return $this;
    }

    public function getGateway()
    {
        return $this->gateway;
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }
    /**
     * @inheritDoc
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->gateway->getBaseUrl() . $this->getEndpoint(),
            $this->getHeaders(),
            json_encode($data),
        );

        return $this->createResponse(
            $httpResponse->getBody()->getContents(),
            $httpResponse->getStatusCode(),
        );
    }

}
