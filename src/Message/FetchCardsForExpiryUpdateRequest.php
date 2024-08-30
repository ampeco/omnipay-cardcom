<?php

namespace Ampeco\OmnipayCardcom\Message;

class FetchCardsForExpiryUpdateRequest extends AbstractRequest {

    public function getEndpoint(): string
    {
        return '/api/v11/RecuringPayments/GetMuhlafimByDate';
    }

    public function getData(): array
    {
        return [
            'apiUserName' => $this->gateway->getApiName(),
            'apiPassword' => $this->gateway->getApiPassword(),
            'fromDate' => $this->gateway->getFromDate(),
            'toDate' => $this->gateway->getToDate(),
        ];
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new FetchCardsForExpiryUpdateResponse($this, $data, $statusCode);
    }
}
