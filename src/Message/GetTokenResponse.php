<?php

namespace Ampeco\OmnipayCardcom\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\NotificationInterface;
use function Symfony\Component\Translation\t;

class GetTokenResponse extends AbstractResponse implements NotificationInterface
{
    public function __construct(AbstractRequest $request, $data, int $userId)
    {
        parent::__construct($request, $data);
        $this->data = json_decode($data, true);
        $this->userId = $userId;
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

    /**
     * @inheritDoc
     */
    public function getTransactionStatus()
    {
        // TODO: Implement getTransactionStatus() method.
    }

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        // TODO: Implement getMessage() method.
    }

    public function isSuccessful(): bool
    {
        return @$this->data['ResponseCode'] === 0;
    }

    public function isForTokenization(): bool
    {
        return @$this->data['Operation'] == 'CreateTokenOnly';
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
