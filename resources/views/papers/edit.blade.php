@extends('layouts.app.base')

@section('content')
    <section class="pt-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('papers.update', $paper) }}" method="POST">
                        @csrf

                        @method('PUT')

                        @include('papers.components.form', ['paper' => $paper, 'categories' => $categories])
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
