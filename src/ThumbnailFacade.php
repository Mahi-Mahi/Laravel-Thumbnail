<?php

namespace Mahi\Thumbnail;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mahi\Thumbnail\Skeleton\SkeletonClass
 */
class ThumbnailFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-thumbnails';
    }
}
