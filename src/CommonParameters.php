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

    public function getTerminalId()
    {
        return $this->getParameter('terminal_id');
    }

    public function setTerminalId($value)
    {
        return $this->setParameter('terminal_id', $value);
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

}
