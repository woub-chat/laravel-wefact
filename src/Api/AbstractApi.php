<?php

namespace Bfg\Wefact\Api;

use Bfg\Wefact\Client;

abstract class AbstractApi implements ApiInterface
{
    /** @var \Bfg\Wefact\Client */
    public $client;

    /**
     * AbstractApi constructor.
     * @param \Bfg\Wefact\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function post($parameters)
    {
        $parameters['limit'] = isset($parameters['limit']) ? $parameters['limit'] : 99999;

        return $this->client->getHttpClient()->post(array_merge([
            'api_key' => $this->client->getHttpClient()->getOptions()['key']
        ], $parameters));
    }
}
