<?php

namespace Bfg\Wefact\Api;

class Debtors extends AbstractApi
{
    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/attachment-add
     * @see https://www.wefact.nl/developer/api/debiteuren/attachment-delete
     * @see https://www.wefact.nl/developer/api/debiteuren/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \Bfg\Wefact\Api\Attachments($this->client);
    }

    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/list
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'list'], $params));
    }


    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'show'], $params));
    }
}
