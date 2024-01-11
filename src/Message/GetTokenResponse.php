<?php

namespace Ampeco\OmnipayCardcom\Message;

use Omnipay\Common\Message\NotificationInterface;

class GetTokenResponse extends Response implements NotificationInterface
{
    public function __construct(AbstractRequest $request, $data, int $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }
    /**
     * @inheritDoc
     */
    public function getData()
    {
        return $this->data;
    }

    public function getToken(): string
    {
        return @$this->data['TokenInfo']['Token'];
    }

    public function getCardNumber(): string
    {
        return @$this->data['TranzactionInfo']['Last4CardDigitsString'];
    }

    public function getCardType(): string
    {
        return @$this->data['TranzactionInfo']['Brand'];
    }

    public function getCardData()
    {
        return @$this->data['TokenInfo'];
    }

    /**
     * @inheritDoc
     */
    public function getTransactionReference()
    {
       return @$this->data['LowProfileId'];
    }

    public function isForTokenization(): bool
    {
        return @$this->data['Operation'] == 'CreateTokenOnly';
    }

    /**
     * @inheritDoc
     */
    public function getTransactionStatus()
    {
    }

    public function getCardReference(): ?string
    {
        return $this->isSuccessful() ? $this->getToken() : null;
    }

    public function getPaymentMethod(): object
    {
        $result = new \stdClass();

        $result->imageUrl = '';
        $result->last4 = $this->getCardNumber();
        $result->cardType = $this->getCardType();

        $result->expirationMonth = $this->getCardData()['CardMonth'];
        $result->expirationYear = $this->getCardData()['CardYear'];

        return $result;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
