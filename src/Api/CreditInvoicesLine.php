<?php

namespace Invato\Wefact\Api;

class CreditInvoicesLine extends AbstractApi
{
    /**
     * @see https://www.wefact.nl/developer/api/inkoopfacturen/creditinvoiceline-add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoiceline', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/inkoopfacturen/creditinvoiceline-delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoiceline', 'action' => 'delete'], $params));
    }
}