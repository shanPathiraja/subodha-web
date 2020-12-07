@extends('layouts.master')

@section('main')
    <!-- Content -->
    <main role="main">
        @yield('content')
    </main>

    <!-- Notification -->
    {{-- <flash data="{{ session('flash') }}"></flash> --}}
@endsection
