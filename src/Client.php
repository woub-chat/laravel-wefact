<?php

namespace Bfg\Wefact;

use Bfg\Wefact\Api\Attachments;
use Bfg\Wefact\Api\CreditInvoices;
use Bfg\Wefact\Api\Creditors;
use Bfg\Wefact\Api\Debtors;
use Bfg\Wefact\Api\Groups;
use Bfg\Wefact\Api\Invoices;
use Bfg\Wefact\Api\PriceQuotes;
use Bfg\Wefact\Api\Products;
use Bfg\Wefact\Api\Settings;
use Bfg\Wefact\Api\Subscriptions;
use Bfg\Wefact\HttpClient\HttpClient;
use InvalidArgumentException;

/**
 * @method Attachments attachments()
 * @method CreditInvoices creditInvoices()
 * @method Creditors creditors()
 * @method Debtors debtors()
 * @method Groups groups()
 * @method Invoices invoices()
 * @method PriceQuotes priceQuotes()
 * @method Products products()
 * @method Subscriptions subscriptions()
 * @method Settings settings()
 */
class Client
{
    /** @var array */
    protected $classes = [
        'attachments' => 'Attachments',
        'creditInvoices' => 'CreditInvoices',
        'creditors' => 'Creditors',
        'debtors' => 'Debtors',
        'groups' => 'Groups',
        'invoices' => 'Invoices',
        'priceQuotes' => 'PriceQuotes',
        'products' => 'Products',
        'subscriptions' => 'Subscriptions',
        'settings' => 'Settings'
    ];

    /** @var \Bfg\Wefact\HttpClient */
    protected $httpClient;

    /** @var array */
    protected $options = [];

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        try {
            return $this->api($method);
        } catch (InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called:"%s"', $method));
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function api($name)
    {
        if (!isset($this->classes[$name])) {
            throw new InvalidArgumentException(sprintf('Undefined method called:"%s"', $name));
        }

        $class = '\\Bfg\\Wefact\\Api\\' . $this->classes[$name];

        return new $class($this);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!isset($this->httpClient)) {
            $this->httpClient = new HttpClient();
        }

        $this->httpClient->setOptions($this->options);

        return $this->httpClient;
    }

    /**
     * @param $options
     * @return Client
     */
    public function setOptions($options): Client
    {
        $this->options = $options;

        return $this;
    }
}
