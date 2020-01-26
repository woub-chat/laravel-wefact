<?php

namespace Invato\Wefact\Api;

use Invato\Wefact\Client;

abstract class AbstractApi implements ApiInterface
{
    /** @var \Invato\Wefact\Client */
    public $client;

    /**
     * AbstractApi constructor.
     * @param \Invato\Wefact\Client $client
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
        return $this->client->getHttpClient()->post(array_merge([
            'api_key' => $this->client->getHttpClient()->getOptions()['key']
        ], $parameters));
    }
}