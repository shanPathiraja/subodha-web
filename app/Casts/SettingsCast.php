<?php

namespace App\Casts;

use App\Values\Settings;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class SettingsCast implements CastsAttributes
{
    /**
     * {@inheritdoc}
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return new Settings($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $attributes;
    }
}
