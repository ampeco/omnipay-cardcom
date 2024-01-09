<?php

namespace Ampeco\OmnipayCardcom\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class CreateCardResponse extends Response implements RedirectResponseInterface
{
    public function __construct(AbstractRequest $request, $data, $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }

    public function isRedirect(): bool
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->data['Url'] ?? null;
    }

    public function getTransactionReference(): ?string
    {
        return $this->data['LowProfileId'] ?? null;
    }

}
