<?php

namespace Ampeco\OmnipayCardcom\Message;

class VoidResponse extends Response
{
    public function __construct(AbstractRequest $request, $data, $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }

    public function isSuccessful() : bool
    {
        return $this->getCode() < 400 && $this->data['ResponseCode'] === self::VOID_RESPONSE_CODE_SUCCESS;
    }

    public function getApprovalNumber()
    {
        return @$this->data['ApprovalNumber'];
    }
}
