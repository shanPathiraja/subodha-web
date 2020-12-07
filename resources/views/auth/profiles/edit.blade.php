@extends('layouts.app.base')

@section('content')
    <section class="pt-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h3 class="text-gray-800 font-bold text-2xl">Account Settings</h3>

                        <h6 class="text-sm text-gray-600">Customize your experience here at {{ config('app.name') }}</h6>
                    </div>
                </div>
            </div>

            <hr class="mt-2 lg:mt-4">
        </div>
    </section>

    <section class="pt-6 pb-12">
        <div class="container">
            @include('auth.profiles.components.forms._profile', ['user' => $user])

            <hr class="mb-8">

            @include('auth.profiles.components.forms._privacy', ['user' => $user])

            <hr class="mb-8">

            @include('auth.profiles.components.forms._security', ['user' => $user])
        </div>
    </section>

    <!-- Delete Confirmation Modal -->
    @include('auth.profiles.components.modals._delete-confirmation', ['user' => $user])
@endsection
