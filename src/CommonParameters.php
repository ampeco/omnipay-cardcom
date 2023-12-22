<?php

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
}
