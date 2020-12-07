@extends('layouts.web.base')

@section('content')
    <section id="main-hero" class="bg-gray-900 min-h-screen py-12">
        <div class="container flex flex-col">
            <div class="row justify-center">
                <div class="col-lg-10">
                    <about :profile="{{ $subodha->profile }}" profile-photo="{{ $subodha->photo }}" auth="{{ auth()->check() }}"></about>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900 py-16">
        <div class="container">
            <div class="row justify-center">
                <div class="col-md-6 mb-6">
                    <div class="mb-6">
                        <h2 class="text-2xl text-white font-bold">Honors and Awards</h2>
                    </div>

                    <events :events="{{ $awards }}" type="award" signed-in="{{ auth()->check() }}"></events>
                </div>

                <div class="col-md-6 mb-6">
                    <div class="mb-6">
                        <h2 class="text-2xl text-white font-bold">Work Experience</h2>
                    </div>

                    <events :events="{{ $work }}" type="work" signed-in="{{ auth()->check() }}"></events>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/animations/three.js') }}"></script>
    <script src="{{ asset('js/animations/net.js') }}"></script>
    <script>
        VANTA.NET({
            el: "#main-hero",
            mouseControls: true,
            touchControls: true,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            points: 13.00,
            maxDistance: 23.00,
            spacing: 19.00,
            color: 0x023D80,
            backgroundColor: 0x1A202C,
        })
    </script>
@endpush
