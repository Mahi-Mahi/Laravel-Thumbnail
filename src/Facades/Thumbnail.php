<?php

namespace Mahi\Thumbnail\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mahi\Thumbnail\Skeleton\SkeletonClass
 */
class Thumbnail extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'thumbnail';
    }
}
