<?php

namespace App\Http\Requests\Traits;

use App\User;
use Illuminate\Validation\Rule;
use App\Rules\CurrentPasswordCheck;

trait ValidationRules
{
    /**
     * Get post input validation rules.
     *
     * @return array
     */
    protected function postRules()
    {
        return config('validation.post');
    }

    /**
     * Get paper input validation rules.
     *
     * @return array
     */
    protected function paperRules()
    {
        return config('validation.paper');
    }

    /**
     * Get announcement input validation rules.
     *
     * @return array
     */
    protected function announcementRules()
    {
        return config('validation.announcement');
    }

    /**
     * Get category input validation rules.
     *
     * @return array
     */
    protected function categoryRules()
    {
        return config('validation.category');
    }

    /**
     * Get client message input validation rules.
     *
     * @return array
     */
    protected function messageRules()
    {
        return config('validation.message');
    }

    /**
     * Get event input validation rules.
     *
     * @return array
     */
    protected function eventRules()
    {
        return config('validation.event');
    }

    /**
     * Get user profile input validation rules.
     *
     * @return array
     */
    protected function profileContentRules()
    {
        return config('validation.profile');
    }

    /**
     * Get user profile rules.
     *
     * @return array
     */
    protected function userProfileRules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'business' => [!request('business') ? 'nullable' : 'required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique((new User())->getTable())->ignore(auth()->id()),
            ],
            'phone' => ['nullable', 'integer', 'min:9'],
        ];
    }

    /**
     * Get user password rules.
     *
     * @return array
     */
    protected function userPasswordRules()
    {
        return [
            'old_password' => ['required', 'string', 'min:8', new CurrentPasswordCheck()],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ];
    }

    /**
     * Get user business rules.
     *
     * @return array
     */
    protected function businessRules()
    {
        return config('validation.business');
    }

    /**
     * Get address input validation rules.
     *
     * @return array
     */
    protected function addressRules()
    {
        return config('validation.address');
    }

    /**
     * Get thread input validation rules.
     *
     * @return array
     */
    protected function threadRules()
    {
        return config('validation.thread');
    }
}
