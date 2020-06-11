<?php

namespace Marshmallow\Breadcrumb\Facades;

class Breadcrumb extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Marshmallow\Breadcrumb\Breadcrumb::class;
    }
}
