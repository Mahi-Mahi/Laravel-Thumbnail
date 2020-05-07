<?php

namespace Mahi\Thumbnail;

use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

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
        $thumb = self::createThumbnail($src, $format);
        if (null === $thumb) {
            return response('', 404);
        }

        return response()->file($thumb);
    }

    public function createThumbnail($src, $format_name = 'default')
    {
        $format = config('laravel-thumbnail.formats.'.$format_name);

        if (!Storage::disk('public')->exists($src)) {
            return null;
        }

        $image = Image::load(storage_path('app/public/'.$src));

        if (isset($format['width'], $format['height'])) {
            $image = $image->fit(Manipulations::FIT_CONTAIN, $format['width'], $format['height']);
            $image = $image->crop(Manipulations::CROP_CENTER, $format['width'], $format['height']);
        } else {
            if (isset($format['width'])) {
                $image = $image->width($format['width']);
            }
        }
        $dest = public_path(config('laravel-thumbnail.src_path').$format_name.'/'.$src);
        @mkdir(dirname($dest), 0777, true);
        $image->save($dest);

        return $dest;
    }

    // return response icon
    public function iconResponse($extension, $format = 'default')
    {
        return redirect(asset('vendor/laravel-thumbnail/icons/'.self::icon($extension)));
    }

    public function dummy($dummy)
    {
        return 'dummy';
    }

    public function icon($extension)
    {
        // $extension = str_replace('jpeg', 'jpg', $extension);
        $extension = preg_replace('#x$#', '', $extension);

        return config('laravel-thumbnail.icons').'/'.$extension.'.png';
    }

    public function getSize($origin, $format)
    {
        return $dest;
    }
}
