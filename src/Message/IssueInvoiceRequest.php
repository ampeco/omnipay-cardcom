<?php

namespace Ampeco\OmnipayCardcom\Message;

class IssueInvoiceRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return '/api/v11/Documents/CreateTaxInvoice';
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {

        return [
            'ApiName' => $this->gateway->getApiName(),
            'ApiPassword' => $this->gateway->getApiPassword(),
            'InvoiceType' => $this->gateway->getInvoiceType(),
            'InvoiceLines' => $this->gateway->getInvoiceLines(),
            'InvoiceHead' => $this->gateway->getInvoiceHead(),
            'CustomLines' => $this->gateway->getCustomLines(),
            'DealNumbers' => $this->gateway->getDealNumbers(),
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new IssueInvoiceResponse($this, $data, $statusCode);
    }
}
