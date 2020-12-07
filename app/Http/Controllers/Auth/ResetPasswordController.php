<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserPasswordRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Reset user's password.
     *
     * @param \App\Http\Requests\UserPassword $request
     * @param \App\User                       $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserPasswordRequest $request, User $user)
    {
        $this->resetPassword($user, $request->password);

        return $this->success(route('users.edit', compact('user')));
    }
}
