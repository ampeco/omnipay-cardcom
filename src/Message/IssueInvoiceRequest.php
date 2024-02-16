<?php

namespace Ampeco\OmnipayCardcom\Message;

class IssueInvoiceRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return '/api/v11/Transactions/Transaction';
    }

    public function setExpiration($value)
    {
        return $this->setParameter('expiration', $value);
    }

    public function getExpiration()
    {
        return $this->getParameter('expiration');
    }

    public function setInvoiceIssuerName($value)
    {
        return $this->setParameter('invoice_issuer_name', $value);
    }

    public function getInvoiceIssuerName()
    {
        return $this->getParameter('invoice_issuer_name');
    }

    public function setInvoiceTaxId($value)
    {
        return $this->setParameter('invoice_tax_id', $value);
    }

    public function getInvoiceTaxId()
    {
        return $this->getParameter('invoice_tax_id');
    }

    public function setInvoiceEmail($value)
    {
        return $this->setParameter('invoice_email', $value);
    }

    public function getInvoiceEmail()
    {
        return $this->getParameter('invoice_email');
    }

    public function setIsSendByEmail($value)
    {
        return $this->setParameter('is_send_by_email', $value);
    }

    public function getIsSendByEmail()
    {
        return $this->getParameter('is_send_by_email');
    }

    public function setInvoiceAddress($value)
    {
        return $this->setParameter('invoice_address', $value);
    }

    public function getInvoiceAddress()
    {
        return $this->getParameter('invoice_address');
    }

    public function setInvoiceCity($value)
    {
        return $this->setParameter('invoice_city', $value);
    }

    public function getInvoiceCity()
    {
        return $this->getParameter('invoice_city');
    }

    public function setInvoiceMobilePhone($value)
    {
        return $this->setParameter('invoice_mobile_phone', $value);
    }

    public function getInvoiceMobilePhone()
    {
        return $this->getParameter('invoice_mobile_phone');
    }

    public function setInvoiceLandlinePhone($value)
    {
        return $this->setParameter('invoice_landline_phone', $value);
    }

    public function getInvoiceLandlinePhone()
    {
        return $this->getParameter('invoice_landline_phone');
    }

    public function setInvoiceDepartmentId($value)
    {
        return $this->setParameter('invoice_department_id', $value);
    }

    public function getInvoiceDepartmentId()
    {
        return $this->getParameter('invoice_department_id');
    }

    public function setInvoiceLanguage($value)
    {
        return $this->setParameter('invoice_language', $value);
    }

    public function getInvoiceLanguage()
    {
        return $this->getParameter('invoice_language');
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'TerminalNumber' => $this->gateway->getTerminalId(),
            'ApiName' => $this->gateway->getApiName(),
            'Token' => $this->getToken(),
            'CardExpirationMMYY' => $this->getExpiration(),
            'Amount' => $this->getAmount(),
            'ExternalUniqTranId' => $this->getTransactionId(),
            'Document' => [
                'Name' => $this->getInvoiceIssuerName(),
                'TaxId' => $this->getInvoiceTaxId(),
                'Email' => $this->getInvoiceEmail(),
                'IsSendByEmail' => $this->getIsSendByEmail(),
                'AddressLine1' => $this->getInvoiceAddress(),
                'City' => $this->getInvoiceCity(),
                'Mobile' => $this->getInvoiceMobilePhone(),
                'Phone' => $this->getInvoiceLandlinePhone(),
                'DepartmentId' => $this->getInvoiceDepartmentId(),
                'Language' => $this->getInvoiceLanguage(),
            ],
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new Response($this, $data, $statusCode);
    }
}
