<?php

namespace Caffeinated\Alcomponente\Facades;

use Illuminate\Support\Facades\Facade;

class Alcomponente extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'alcomponente';
    }
}
