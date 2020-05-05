<?php

namespace MahiMahi\LaravelThumbnails;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MahiMahi\LaravelThumbnails\Skeleton\SkeletonClass
 */
class LaravelThumbnailsFacade extends Facade
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
