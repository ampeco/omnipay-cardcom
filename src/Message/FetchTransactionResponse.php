<?php

namespace Ampeco\OmnipayCardcom\Message;

class FetchTransactionResponse extends Response
{
    public function __construct(AbstractRequest $request, $data, $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }

    public function isSuccessful() : bool
    {
        return $this->getCode() < 400 && in_array($this->data['ResponseCode'], [self::AUTHORIZE_RESPONSE_CODE_SUCCESS, self::AUTHORIZE_VALID_APPROVAL_RESPONSE_CODE_SUCCESS, self::PURCHASE_RESPONSE_CODE_SUCCESS]);
    }

    public function getApprovalNumber()
    {
        return @$this->data['ApprovalNumber'];
    }

    public function getToken()
    {
        return @$this->data['Token'];
    }
}
