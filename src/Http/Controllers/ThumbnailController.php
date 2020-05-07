<?php

namespace Mahi\Thumbnail\Http\Controllers;

use Illuminate\Http\Request;
use Mahi\Thumbnail\Facades\Thumbnail;

class ThumbnailController
{
    public function __invoke(Request $request)
    {
        preg_match('#^'.config('laravel-thumbnail.route').'(?P<format>[^/]+)/(?P<path>.+)$#', '/'.$request->path(), $match);
        extract($match);

        $extension = preg_replace('#^.*\\.(.*)$#', '\\1', $path);

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                return Thumbnail::thumbResponse($path, $format);

            break;
            default:
                return Thumbnail::iconResponse($extension, $format);

            break;
        }
    }
}
