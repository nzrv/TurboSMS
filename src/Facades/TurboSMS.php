<?php

namespace Nzrv\TurboSMS\Facades;

use Illuminate\Support\Facades\Facade;

class TurboSMS extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'turbosms';
    }

}