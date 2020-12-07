@extends('layouts.master', ['bgcolor' => 'bg-white', 'title' => 'Dashboard'])

@section('main')
    <!-- Header -->
    @include('layouts.app.partials._header')

    <!-- Content -->
    <main role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        @include('layouts.app.partials._footer')
    </footer>

    <!-- Notification -->
    {{-- <flash message="{{ session('status') }}"></flash> --}}
@endsection
