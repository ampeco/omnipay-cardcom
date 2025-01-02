<?php

namespace Ampeco\OmnipayCardcom;

trait CommonParameters
{
    public function getApiName()
    {
        return $this->getParameter('api_name');
    }

    public function setApiName($value)
    {
        return $this->setParameter('api_name', $value);
    }

    public function getApiPassword()
    {
        return $this->getParameter('api_password');
    }

    public function setApiPassword($value)
    {
        return $this->setParameter('api_password', $value);
    }

    public function getTerminalId()
    {
        return $this->getParameter('terminal_id');
    }

    public function setTerminalId($value)
    {
        return $this->setParameter('terminal_id', $value);
    }

    public function getHoldTerminalId()
    {
        return $this->getParameter('hold_terminal_id');
    }

    public function setHoldTerminalId($value)
    {
        return $this->setParameter('hold_terminal_id', $value);
    }

    public function getLowProfileId()
    {
        return $this->getParameter('low_profile_id');
    }

    public function setLowProfileId($value)
    {
        return $this->setParameter('low_profile_id', $value);
    }

    public function setUserId($value)
    {
        return $this->setParameter('user_id', $value);
    }

    public function getUserId()
    {
        return $this->getParameter('user_id');
    }

    public function setTokenizationTerminalId($value)
    {
        return $this->setParameter('tokenization_terminal_id', $value);
    }

    public function getTokenizationTerminalId()
    {
        return $this->getParameter('tokenization_terminal_id');
    }

    public function setFromDate($value)
    {
        return $this->setParameter('from_date', $value);
    }

    public function getFromDate()
    {
        return $this->getParameter('from_date');
    }

    public function setToDate($value)
    {
        return $this->setParameter('to_date', $value);
    }

    public function getToDate()
    {
        return $this->getParameter('to_date');
    }

    public function setInvoiceType($value)
    {
        return $this->setParameter('invoice_type', $value);
    }

    public function getInvoiceType()
    {
        return $this->getParameter('invoice_type');
    }

    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }

    public function getQuantity()
    {
        return $this->getParameter('quantity');
    }

    public function setIsPriceIncludeVat($value)
    {
        return $this->setParameter('is_price_include_vat', $value);
    }

    public function getIsPriceIncludeVat()
    {
        return $this->getParameter('is_price_include_vat');
    }

    public function setPrice($value)
    {
        return $this->setParameter('price', $value);
    }

    public function getPrice()
    {
        return $this->getParameter('price');
    }

    public function setTotalLineCost($value)
    {
        return $this->setParameter('total_line_cost', $value);
    }

    public function getTotalLineCost()
    {
        return $this->getParameter('total_line_cost');
    }

    public function setCustName($value)
    {
        return $this->setParameter('custName', $value);
    }

    public function getCustName()
    {
        return $this->getParameter('custName');
    }

    public function setSendByEmail($value)
    {
        return $this->setParameter('send_by_email', $value);
    }

    public function getSendByEmail()
    {
        return $this->getParameter('send_by_email');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setTranDate($value)
    {
        return $this->setParameter('tran_date', $value);
    }

    public function getTranDate()
    {
        return $this->getParameter('tran_date');
    }

    public function setInvoiceLinesDescription($value)
    {
        return $this->setParameter('invoice_lines_description', $value);
    }

    public function getInvoiceLinesDescription()
    {
        return $this->getParameter('invoice_lines_description');
    }

    public function setCustomLinesDescription($value)
    {
        return $this->setParameter('custom_lines_description', $value);
    }

    public function getCustomLinesDescription()
    {
        return $this->getParameter('custom_lines_description');
    }

    public function setSum($value)
    {
        return $this->setParameter('sum', $value);
    }

    public function getSum()
    {
        return $this->getParameter('sum');
    }





    ///v2
    public function setInvoiceLines($value)
    {
        return $this->setParameter('invoice_lines', $value);
    }

    public function getInvoiceLines()
    {
        return $this->getParameter('invoice_lines');
    }

    public function setCustomLines($value)
    {
        return $this->setParameter('custom_lines', $value);
    }

    public function getCustomLines()
    {
        return $this->getParameter('custom_lines');
    }

    public function setInvoiceHead($value)
    {
        return $this->setParameter('invoice_head', $value);
    }

    public function getInvoiceHead()
    {
        return $this->getParameter('invoice_head');
    }

    public function setDealNumbers($value)
    {
        return $this->setParameter('deal_numbers', $value);
    }

    public function getDealNumbers()
    {
        return $this->getParameter('deal_numbers');
    }
}
