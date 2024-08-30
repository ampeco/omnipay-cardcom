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
}
