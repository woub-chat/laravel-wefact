<?php

use Bfg\Wefact\Wefact;

if (!function_exists('wefact')) {
    function wefact()
    {
        return app(Wefact::class);
    }
}
