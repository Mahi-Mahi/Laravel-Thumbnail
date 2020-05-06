<?php

use Mahi\Thumbnail\Http\Controllers\ThumbnailController;

Route::get(config('laravel-thumbnail.route').'{format}/{path}', ThumbnailController::class)
    ->where('format', '[a-z\-\_0-9]+')
    ->where('path', '.+')
    ->name('thumb.format')
    ;

Route::get(config('laravel-thumbnail.route').'{path}', ThumbnailController::class)
    ->where('path', '.+')
    ->name('thumb')
    ;
