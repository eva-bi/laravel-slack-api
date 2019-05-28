<?php

namespace Tuanla\Laravel\SlackWebApi\Facades;

use Illuminate\Support\Facades\Facade;
use Tuanla\Laravel\SlackWebApi\SlackApi as Api;

class SlackApi extends Facade
{
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor()
    {
        return Api::class;
    }
}