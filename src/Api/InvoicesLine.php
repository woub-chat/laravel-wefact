<?php

namespace Invato\Wefact\Api;

class InvoicesLine extends AbstractApi
{
    /**
     * @see https://www.wefact.nl/developer/api/facturen/invoiceline-add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'invoiceline', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/facturen/invoiceline-delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'invoiceline', 'action' => 'delete'], $params));
    }
}