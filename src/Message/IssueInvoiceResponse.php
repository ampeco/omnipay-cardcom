<?php

namespace Ampeco\OmnipayCardcom\Message;

class IssueInvoiceResponse extends Response
{
    public function __construct(AbstractRequest $request, $data, $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }

    public function isSuccessful() : bool
    {
        return $this->getCode() < 400 && $this->data['ResponseCode'] === self::INVOICE_RESPONSE_CODE_SUCCESS && $this->getInvoiceNumber() !== null;
    }

    public function getInvoiceNumber()
    {
        return $this->data['InvoiceNumber'] ?? null;
    }

    public function getDocumentUrl()
    {
        return $this->data['InvoiceLink'] ?? null;
    }

    public function getDescription()
    {
        return $this->data['Description'] ?? null;
    }
}
