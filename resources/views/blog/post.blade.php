@extends('layouts.web.base')

@section('content')
    <section class="py-16 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="text-base leading-6 font-medium mb-5">
                        <time datetime="{{ $post->date }}">{{ \Carbon\Carbon::parse($post->date)->format('l, F j, Y') }}</time>
                    </div>

                    <h1 class="text-gray-800 font-black text-5xl leading-none">{{ $post->title }}</h1>
                </div>
            </div>

            <hr class="my-12">

            <div class="row">
                <div class="mb-12 relative w-full sm:rounded-lg overflow-hidden h-custom">
                    <img src="{{ $post->image ?? 'https://source.unsplash.com/collection/4994391/1980x1080' }}" class="absolute inset-0">
                </div>

                <div class="mb-6 col-lg-3">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-12 w-12 rounded-full overflow-hidden">
                            <img class="h-12 w-12" src="{{ asset($post->user->photo) }}" title="{{ $post->user->name }}">
                        </div>

                        <div class="ml-4">
                            <div class="font-semibold text-gray-800">
                                {{ $post->user->name }}
                            </div>

                            <div>
                                <a class="text-sm" href="/">{{ '@' . $post->user->username }}</a>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="leading-tight">
                        @if ($next || $previous)
                            @if ($next)
                                <h6 class="text-xs tracking-wide uppercase mb-1">Next Article</h6>

                                <a class="text-sm" href="{{ $next->path() }}">{{ $next->title }}</a>
                            @else
                                <h6 class="text-xs tracking-wide uppercase mb-1">Previous Article</h6>

                                <a class="text-sm" href="{{ $previous->path() }}">{{ $previous->title }}</a>
                            @endif
                        @endif
                    </div>

                    <hr class="my-6">

                    <div>
                        <a class="text-sm" href="{{ route('blog.posts') }}"><span class="mr-1">&larr;</span> Back to the blog</a>
                    </div>
                </div>

                <div class="mb-6 col-lg-9 relative">
                    <div class="blog-content md:-mt-8">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
