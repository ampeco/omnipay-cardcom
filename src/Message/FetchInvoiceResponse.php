<?php

namespace Ampeco\OmnipayCardcom\Message;

class FetchInvoiceResponse extends Response
{
    public function __construct(AbstractRequest $request, $data, $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }

    public function isSuccessful() : bool
    {
        return $this->getCode() < 400 && in_array($this->data['ResponseCode'], [self::INVOICE_RESPONSE_CODE_SUCCESS]);
    }

    public function getDocumentUrl()
    {
        return @$this->data['DocUrl'];
    }

    public function getMessage()
    {
        return $this->data['Description'] ?? null;
    }

}
