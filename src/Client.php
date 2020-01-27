<?php

namespace Invato\Wefact;

use Invato\Wefact\HttpClient\HttpClient;

class Client
{
    /** @var array */
    protected $classes = [
        'attachments' => 'Attachments',
        'creditinvoices' => 'CreditInvoices',
        'creditInvoices' => 'CreditInvoices',
        'creditors' => 'Creditors',
        'debtors' => 'Debtors',
        'groups' => 'Groups',
        'invoices' => 'Invoices',
        'pricequotes' => 'PriceQuotes',
        'priceQuotes' => 'PriceQuotes',
        'products' => 'Products',
        'subscriptions' => 'Subscriptions',
        'settings' => 'Settings'
    ];

    /** @var \Invato\Wefact\HttpClient */
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
            throw new \InvalidArgumentException(sprintf('Undefined method called:"%s"', $name));
        }

        $class = '\\Invato\\Wefact\\Api\\' . $this->classes[$name];

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

        $this->httpClient->setOptions($this->getOptions());

        return $this->httpClient;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }
}