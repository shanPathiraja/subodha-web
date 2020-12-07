@extends('layouts.app.base')

@section('content')
    <section class="pt-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('posts.components.form', ['post' => new App\Post, 'categories' => $categories])
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            Laraberg.init('body', {
                height: '600px',
                laravelFilemanager: false,
                sidebar: false
            });
        });
    </script>
@endpush
