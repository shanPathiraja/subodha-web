@extends('layouts.app.base')

@section('content')
    <section class="pt-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('announcements.update', $announcement) }}" method="POST">
                        @csrf

                        @method('PUT')

                        @include('announcements.components.form', ['announcements' => $announcement])
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection