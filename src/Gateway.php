<?php

namespace Ampeco\OmnipayCardcom;

/**
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */

use Ampeco\OmnipayCardcom\Message\AbstractRequest;
use Ampeco\OmnipayCardcom\Message\AuthorizeRequest;
use Ampeco\OmnipayCardcom\Message\CaptureRequest;
use Ampeco\OmnipayCardcom\Message\CreateCardRequest;
use Ampeco\OmnipayCardcom\Message\FetchCardsForExpiryUpdateRequest;
use Ampeco\OmnipayCardcom\Message\FetchInvoiceRequest;
use Ampeco\OmnipayCardcom\Message\FetchTransactionRequest;
use Ampeco\OmnipayCardcom\Message\GetTokenRequest;
use Ampeco\OmnipayCardcom\Message\IssueInvoiceRequest;
use Ampeco\OmnipayCardcom\Message\PurchaseRequest;
use Ampeco\OmnipayCardcom\Message\RefundRequest;
use Ampeco\OmnipayCardcom\Message\VoidRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use CommonParameters;

    const API_URL_PROD = 'https://secure.cardcom.solutions';

    /**
     * @return string
     */
    public function getName()
    {
        return 'Cardcom';
    }

    public function getBaseUrl(): string
    {
        return static::API_URL_PROD;
    }

    public function createCard(array $options = [])
    {
        return $this->createRequest(CreateCardRequest::class, $options);
    }

    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    protected function createRequest($class, array $parameters)
    {
        /** @var AbstractRequest */
        $req = parent::createRequest($class, $parameters);

        return $req->setGateway($this);
    }

    public function getCreateCardCurrency(): string
    {
        return 'ILS';
    }

    public function getCreateCardAmount(): int
    {
        return 1;
    }

    public function getToken(array $options = [])
    {
        return $this->createRequest(GetTokenRequest::class, $options);
    }

    public function authorize(array $options = [])
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    public function capture(array $options = [])
    {
        return $this->createRequest(CaptureRequest::class, $options);
    }

    public function refund(array $options = [])
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    public function void(array $options = [])
    {
        return $this->createRequest(VoidRequest::class, $options);
    }

    public function query(array $options = [])
    {
        return $this->createRequest(FetchTransactionRequest::class, $options);
    }

    public function issueInvoice(array $options = [])
    {
        return $this->createRequest(IssueInvoiceRequest::class, $options);
    }

    public function fetchInvoice(array $options = [])
    {
        return $this->createRequest(FetchInvoiceRequest::class, $options);
    }

    public function fetchCardsForExpiryUpdate(array $options = [])
    {
        return $this->createRequest(FetchCardsForExpiryUpdateRequest::class, $options);
    }
}
