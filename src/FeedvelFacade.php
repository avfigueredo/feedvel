<?php

namespace Avfigueredo\Feedvel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Avfigueredo\Feedvel\Feedvel
 */
class FeedvelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'feedvel';
    }
}
