@extends('layouts.web.base')

@section('content')
    <section class="py-16 bg-gray-900">
        <div class="container">
            <div class="row items-center">
                <div class="col-lg-7 col-md-6 mb-6 md:mb-0">
                    <h2 class="text-white font-bold text-3xl">Latest Publications</h2>

                    <h6 class="font-medium max-w-lg">Outcomes of staring at a screen and trying to make sense out of it</h6>
                </div>

                <div class="col-lg-5 col-md-6">
                    <form action="{{ route('publications.papers') }}" method="GET" accept-charset="utf-8">
                        <input type="text" name="search" required id="search" class="form-input bg-gray-800 focus:bg-gray-900 border-gray-800 block w-full" placeholder="Search research papers" value="{{ request('search') ?? null }}">
                    </form>
                </div>
            </div>

            <div class="h-px border-t border-gray-800 w-full my-12"></div>

            <div class="row">
                @foreach ($papers as $paper)
                    <div class="col-lg-4 col-sm-6 mb-8 flex flex-col">
                        <div class="rounded-lg overflow-hidden shadow flex flex-col flex-1">
                            <div class="h-48">
                                <img src="{{ $paper->image ?? 'https://source.unsplash.com/collection/4994391/1980x1080' }}" class="w-full">
                            </div>

                            <div class="px-4 py-5 sm:px-6 bg-gray-800 flex felx-col flex-1">
                                <div class="flex flex-col flex-1 justify-between">
                                    <div class="flex flex-col justify-between">
                                        <div>
                                            <a href="{{ route('publications.category', ['category' => $paper->category->slug]) }}" class="px-3 py-1 text-sm text-gray-200 hover:text-gray-200 bg-gray-900 rounded-full font-medium">
                                                {{ $paper->category->name }}
                                            </a>
                                        </div>

                                        <a href="{{ $paper->path() }}">
                                            <h4 class="mt-4 text-white font-semibold text-xl">{{ $paper->title }}</h4>
                                        </a>

                                        <div class="mt-4 text-gray-500 font-semibold uppercase text-xs tracking-wide">
                                            {{ $paper->venue }}
                                        </div>

                                        <div class="mt-4">
                                            @foreach ($paper->authors as $author)
                                                <span class="text-xs font-medium mr-2 px-2 py-1 rounded-full bg-gray-700 text-gray-200">{{ $author }}</span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mt-10 flex justify-between items-baseline">
                                        <a class="text-sm text-white hover:text-gray-300" href="{{ $paper->path() }}">Continue reading <span class="ml-1">&rarr;</span></a>

                                        <span class="text-sm">{{ $paper->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-900">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white">
                    {{ $papers->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
