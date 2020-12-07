<?php

namespace App\Traits;

trait HasImage
{
    /**
     * Boot HasImage trait.
     */
    protected static function bootHasImage()
    {
        static::saving(fn ($model) => static::saveImage($model));
    }

    /**
     * Save image details to model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    protected static function saveImage($model)
    {
        if (request()->has('featured')) {
            $model->image = request('featured');
        }
    }
}
