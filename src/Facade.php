<?php

namespace Invato\Wefact;

/**
 * @method static \Invato\Wefact\Api\Debtors debtors()
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
