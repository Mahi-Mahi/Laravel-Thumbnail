<?php

namespace Mahi\Thumbnail;

class Thumbnail
{
    public function __construct()
    {
    }

    // return thumbnail url
    public function get($src, $format = 'default')
    {
        return route('thumb.format', ['path' => $src, 'format' => $format]);
    }

    // create thumbnail and return response redirect
    public function thumbResponse($src, $format = 'default')
    {
        return '';
    }

    // return response icon
    public function iconResponse($src, $format = 'default')
    {
        return response();
    }

    public function dummy($dummy)
    {
        return 'dummy';
    }

    public function icon($extension)
    {
        $extension = preg_replace('x$', '', $extension);

        return config('laravel-thumbnail.icons').'/'.$extension.'.png';
    }
}
