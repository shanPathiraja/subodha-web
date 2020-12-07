@extends('layouts.auth.base')

@section('content')
    <section class="relative bg-auth min-h-screen py-0 md:py-24 bg-contain bg-no-repeat min-h-screen bg-right-top">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-4 col-lg-5 col-md-7">
                    <div>
                        <a href="{{ url('/') }}" class="block h-5">
                            <img class="mx-auto h-5 w-auto" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" />
                        </a>

                        <h2 class="mt-6 text-center text-3xl font-semibold text-gray-800">
                            Reset password
                        </h2>

                        <p class="mt-2 text-center text-sm text-gray-600">
                            Enter the email address associated with your account and we'll send you a link to reset your password.
                        </p>
                    </div>

                    <form class="mt-6" action="{{ route('password.email') }}" method="POST">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('components.forms.fields._email')

                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary w-full">
                                Request password reset link <span class="ml-1">&rarr;</span>
                            </button>
                        </div>

                        <div class="mt-6 text-center">
                            <span class="text-sm text-gray-600">
                                Just remembered your password? <a class="text-indigo-500 hover:text-indigo-400" href="{{ route('login') }}">Sign in</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
