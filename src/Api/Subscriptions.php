<?php

namespace Invato\Wefact\Api;

class Subscriptions extends AbstractApi
{
    /**
     * @see https://www.wefact.nl/developer/api/crediteuren/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'subscription', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/crediteuren/attachment-add
     * @see https://www.wefact.nl/developer/api/crediteuren/attachment-delete
     * @see https://www.wefact.nl/developer/api/crediteuren/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \Invato\Wefact\Api\Attachments($this->client);
    }

    /**
     * @see https://www.wefact.nl/developer/api/crediteuren/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'subscription', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/crediteuren/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'subscription', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/crediteuren/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'subscription', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/crediteuren/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'subscription', 'action' => 'show'], $params));
    }
}