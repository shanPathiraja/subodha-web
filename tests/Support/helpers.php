<?php

if (!function_exists('create')) {
    /**
     * Create a model factory builder for a given class, name, and amount.
     *
     * @param string $class
     * @param array  $attributes
     * @param int    $times
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function create(string $class, array $attributes = [], ?int $times = null)
    {
        return factory($class, $times)->create($attributes);
    }
}

if (!function_exists('make')) {
    /**
     * Create a model factory builder for a given class, name, and amount.
     *
     * @param string $class
     * @param array  $attributes
     * @param int    $times
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function make(string $class, array $attributes = [], ?int $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}
