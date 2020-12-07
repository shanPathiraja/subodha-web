@extends('layouts.auth.base')

@section('content')
    <div class="row no-gutters min-h-screen">
        <div class="col-lg-5 col-md-7 min-h-screen flex items-center justify-center">
            <div class="flex-1 px-16">
                <div>
                    <a href="{{ url('/') }}" class="block h-3">
                        <img class="h-3 w-auto inline" src="{{ asset('img/logo-dark.png') }}" alt="{{ config('app.name') }}" />
                    </a>

                    <h2 class="mt-10 text-3xl font-bold text-gray-800">
                        Welcome back
                    </h2>

                    <p class="text-gray-600">
                        Sign in to your account
                    </p>
                </div>

                <login></login>

                @if (Route::has('register'))
                    <div class="mt-4">
                        <span class="text-sm text-gray-600">
                            Don't have an account yet? <a href="/register">Sign up</a>
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div id="bg-animation" class="col-lg-7 col-md-5 hidden md:block min-h-screen"></div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/animations/three.js') }}"></script>
    <script src="{{ asset('js/animations/halo.js') }}"></script>
    <script>
        VANTA.HALO({
            el: "#bg-animation",
            mouseControls: true,
            touchControls: true,
            minHeight: 200.00,
            minWidth: 200.00,
            baseColor: 0x023D80,
            backgroundColor: 0x1A202C,
        })
    </script>
@endpush
