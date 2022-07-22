<?php

namespace Bfg\Wefact;

class Wefact
{
    /**
     * @param  string  $key
     * @return Client
     */
    public function client(string $key): Client
    {
        $client = new Client();
        $client->setOptions([
            'base_url' => config('wefact.url'),
            'key' => $key
        ]);
        return $client;
    }
}
