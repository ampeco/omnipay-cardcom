<?php

namespace Ampeco\OmnipayCardcom\Message;

class FetchCardsForExpiryUpdateResponse extends Response
{
    public function __construct(AbstractRequest $request, $data, $statusCode)
    {
        parent::__construct($request, $data, $statusCode);
        $this->data = json_decode($data, true);
    }

    public function isSuccessful(): bool
    {
        return isset($this->data['ResponseCode']) && $this->data['ResponseCode'] == 0 && !empty($this->data['UpdateList']);
    }

    public function getUpdateList()
    {
        return $this->data['UpdateList'];
    }
}
