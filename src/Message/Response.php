<?php

namespace Ampeco\OmnipayCardcom\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    private int $code;
    const PURCHASE_RESPONSE_CODE_SUCCESS = 0;
    const AUTHORIZE_RESPONSE_CODE_SUCCESS = 700;
    const AUTHORIZE_VALID_APPROVAL_RESPONSE_CODE_SUCCESS = 701;

    /**
     * @param AbstractRequest $request
     * @param $data
     */
    public function __construct(AbstractRequest $request, $data, int $code)
    {
        parent::__construct($request, $data);
        $this->data = json_decode($data, true);
        $this->code = $code;
    }

    public function getCode(): int|string|null
    {
        return $this->code;
    }

    public function isSuccessful(): bool
    {
        return $this->getCode() < 400 && $this->data['ResponseCode'] === self::PURCHASE_RESPONSE_CODE_SUCCESS;
    }


}
