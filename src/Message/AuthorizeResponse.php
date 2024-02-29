<?php

namespace Ampeco\OmnipayCardcom\Message;

class AuthorizeResponse extends Response
{
    public function isSuccessful() : bool
    {
        return in_array($this->data['ResponseCode'], [self::AUTHORIZE_RESPONSE_CODE_SUCCESS, self::AUTHORIZE_VALID_APPROVAL_RESPONSE_CODE_SUCCESS]);
    }

    public function getTransactionReference()
    {
        return $this->data['TranzactionId'];
    }

}
