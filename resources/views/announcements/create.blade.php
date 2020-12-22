@extends('layouts.app.base')

@section('content')
    <section class="pt-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('announcements.store') }}" method="POST">
                        @csrf

                        @include('announcements.components.form', ['announcement' => new App\Announcement])
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
