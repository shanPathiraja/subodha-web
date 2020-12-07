<?php

namespace App\Traits;

trait Publishable
{
    /**
     * Boot HasImage trait.
     */
    protected static function bootPublishable()
    {
        if (request()->has('publishable')) {
            static::saving(function ($model) {
                $model->published = is_null(request('published')) ? false : true;
            });
        }
    }
}
