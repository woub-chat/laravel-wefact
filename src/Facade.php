<?php

namespace Bfg\Wefact;

/**
 * @method static \Bfg\Wefact\Api\Debtors debtors()
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'Wefact';
    }
}
