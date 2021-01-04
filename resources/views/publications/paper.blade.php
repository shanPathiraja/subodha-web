@extends('layouts.web.base')

@section('content')
    <section class="py-16 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="text-base leading-6 font-medium mb-5">
                        <time datetime="{{ $paper->date }}">{{ \Carbon\Carbon::parse($paper->date)->format('l, F j, Y') }}</time>
                    </div>

                    <h1 class="text-gray-800 font-black text-5xl leading-none">{{ $paper->title }}</h1>
                </div>
            </div>

            <hr class="my-12">

            <div class="row">
                <div class="mb-12 relative w-full sm:rounded-lg overflow-hidden h-custom">
                    <img src="{{ $paper->image ?? 'https://source.unsplash.com/collection/4994391/1980x1080' }}" class="absolute inset-0">
                </div>

                <div class="mb-6 col-lg-3">
                    <div class="flex items-center">
                        <div>
                            <div class="text-xs uppercase font-medium tracking-wide mb-2">Conference</div>

                            <span class="text-xs font-medium mr-2 px-2 py-1 text-blue-800">{{ $paper->venue }}</span>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="flex items-center">
                        <div>
                            <div class="text-xs uppercase font-medium tracking-wide mb-2">Authors</div>

                            @foreach ($paper->authors as $author)
                                <span class="text-xs font-medium my-2 px-2 py-1 text-blue-800 block">{{ $author }}</span>
                            @endforeach
                        </div>
                    </div>

                    <hr class="my-6">

                    @if ($paper->download_link)
                        <div class="flex items-center">
                            <div>
                                <div class="text-xs uppercase font-medium tracking-wide mb-2">View Full Paper</div>

                                <a href="{{$paper->download_link}}" class="text-sm" target="_blank">Download PDF</a>
                            </div>
                        </div>

                        <hr class="my-6">
                    @endif

                    @if ($next || $previous)
                        <div class="leading-tight">
                            @if ($next)
                                <h6 class="text-xs tracking-wide uppercase mb-1">Next Article</h6>

                                <a class="text-sm" href="{{ $next->path() }}">{{ $next->title }}</a>
                            @else
                                <h6 class="text-xs tracking-wide uppercase mb-1">Previous Article</h6>

                                <a class="text-sm" href="{{ $previous->path() }}">{{ $previous->title }}</a>
                            @endif
                        </div>

                        <hr class="my-6">
                    @endif

                    <div>
                        <a class="text-sm" href="{{ route('publications.papers') }}"><span class="mr-1">&larr;</span> Back to publications</a>
                    </div>
                </div>

                <div class="mb-6 col-lg-9 relative">
                    <div class="blog-content md:-mt-8">
                        {!! $paper->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
