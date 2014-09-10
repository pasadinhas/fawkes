<?php namespace Fawkes\Fenix;

use Illuminate\Support\Facades\Facade;

class Fenix extends Facade {

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fenix';
    }

}