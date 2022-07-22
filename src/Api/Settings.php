<?php

namespace Bfg\Wefact\Api;

class Settings extends AbstractApi
{
    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function costCategoryAdd($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'costcategory_add'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function costCategoryEdit($params)
    {
        return $this->post(array_merge(['controller' => 'settings', 'action' => 'costcategory_edit'], $params));
    }

    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/list
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function costCategoryList($params = [])
    {
        return $this->post(array_merge(['controller' => 'settings', 'action' => 'costcategory_list'], $params));
    }


    /**
     * @see https://www.wefact.nl/developer/api/debiteuren/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function costCategoryShow($params)
    {
        return $this->post(array_merge(['controller' => 'settings', 'action' => 'costcategory_show'], $params));
    }
}
