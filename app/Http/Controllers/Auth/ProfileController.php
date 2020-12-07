<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('auth.profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('auth.profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return $this->success(route('users.edit', compact('user')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return redirect()->back();

        // $user->delete();

        // auth()->logout();

        // return $this->success('/', 'deleted', 'We are sorry to see you go.');
    }
}
