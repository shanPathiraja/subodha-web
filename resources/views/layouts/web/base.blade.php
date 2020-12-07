@extends('layouts.master', ['bgcolor' => 'bg-gray-100'])

@section('main')
    <!-- Header -->
    @include('layouts.web.partials._header')

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.web.partials._footer')
@endsection
