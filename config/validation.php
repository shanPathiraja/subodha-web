<?php

/**
 * All Validation Rules.
 */
return [
    /*
     * Posts Inputs Rules
     */
    'post' => [
        'title' => ['required', 'string', 'max:255'],
        'body' => ['required'],
        'category_id' => ['required', 'integer'],
        'published' => ['nullable'],
    ],

    /*
     * Papers Inputs Rules
     */
    'paper' => [
        'title' => ['required', 'string', 'max:255'],
        'body' => ['required'],
        'category_id' => ['required', 'integer'],
        'published' => ['nullable'],
        'venue' => ['nullable'],
        'authors' => ['nullable'],
    ],

    /*
     * Categories Inputs Rules
     */
    'category' => [
        'name' => ['required', 'string', 'max:255'],
        'slug' => ['nullable', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
    ],

    /*
     * Categories Inputs Rules
     */
    'announcement' => [
        'date' => ['required', 'date'],
        'description' => ['required', 'string'],
    ],

    /*
     * Client Message Inputs Rules
     */
    'message' => [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['required', 'integer', 'min:9'],
        'subject' => ['required', 'string', 'max:255'],
        'body' => ['required', 'string'],
    ],

    /*
     * Special Event Inputs Rules
     */
    'event' => [
        'title' => ['required', 'string', 'max:255'],
        'period' => ['required', 'string', 'max:255'],
        'venue' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'symbol' => ['nullable', 'image'],
        'type' => ['required', 'string'],
    ],

    /*
     * Address Inputs Rules
     */
    'address' => [
        'street' => ['required', 'string'],
        'state' => ['required', 'string'],
        'city' => ['required', 'string'],
        'country' => ['required', 'string'],
    ],

    /*
     * Registration Inputs Rules
     */
    'registration' => [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'integer', 'min:9'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ],

    /*
     * User Profile Inputs Rules
     */
    'profile' => [
        'about' => ['required', 'string'],
        'email' => ['nullable', 'email'],
        'resume' => ['nullable'],
    ],
];
