<?php

namespace Invato\Wefact;

class Wefact
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /** @var \Invato\Wefact\Client */
    protected $client;

    /** @var array */
    protected $panels = [];

    /**
     * Wefact constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->client, $method], $args);
    }

    /**
     * @param null|string $name
     * @return \Invato\Wefact\Client
     */
    public function panel($name = null)
    {
        $name = $name ?: $this->getDefaultPanel();

        return $this->panels[$name] = $this->get($name);
    }

    /**
     * @return string
     */
    public function getDefaultPanel()
    {
        return $this->app['config']['wefact.default'];
    }

    /**
     * @param string $name
     * @return \Invato\Wefact\Client
     */
    protected function get($name)
    {
        return $this->panels[$name] ?? $this->resolve($name);
    }

    /**
     * @param string $name
     * @return \Invato\Wefact\Client
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        $this->client = new Client();
        $this->client->setOptions([
            'base_url' => $config['url'],
            'key' => $config['key']
        ]);

        return $this->client;
    }

    /**
     * @param string $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["wefact.panels.{$name}"];
    }
}
