<?php

namespace Ampeco\OmnipayCardcom\Message;

class FetchInvoiceRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return '/api/v11/Documents/GetDocumentLink';
    }

    public function setDocumentType($value)
    {
        return $this->setParameter('document_type', $value);
    }

    public function getDocumentType()
    {
        return $this->getParameter('document_type');
    }

    public function setDocumentNumber($value)
    {
        return $this->setParameter('document_number', $value);
    }

    public function getDocumentNumber()
    {
        return $this->getParameter('document_number');
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'ApiName' => $this->gateway->getApiName(),
            'ApiPassword' => $this->gateway->getApiPassword(),
            'DocumentNumber' => $this->getDocumentNumber(),
            'DocumentType' => $this->getDocumentType(),
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new FetchInvoiceResponse($this, $data, $statusCode);
    }
}
