@extends('layouts.web.base')

@section('content')
    <section class="py-16 bg-white">
        <div class="container">
            <div class="row items-center">
                <div class="col-lg-7 col-md-6 mb-6 md:mb-0">
                    <h2 class="text-gray-800 font-bold text-3xl">Latest Posts</h2>

                    <h6 class="font-medium max-w-lg">Articles written about art, sports and other random thoughts since the pre-historic times</h6>
                </div>

                <div class="col-lg-5 col-md-6">
                    <form action="{{ route('blog.posts') }}" method="GET" accept-charset="utf-8">
                        <input type="text" name="search" required id="search" class="form-input block w-full" placeholder="Search blog posts" value="{{ request('search') ?? null }}">
                    </form>
                </div>
            </div>

            @forelse ($posts as $post)
                <div class="row">
                    <div class="col-12 my-10">
                        <div class="h-1 border-t border-gray-300"></div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="mt-2">
                            <a href="{{ route('blog.posts', ['updated' => $post->updated_at]) }}" class="text-gray-600 font-medium">{{ $post->updated_at->format('F j, Y') }}</a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div>
                            <div class="mb-4 relative h-64 bg-gray-100 w-full rounded-lg overflow-hidden">
                                <img src="{{ $post->image ?? 'https://source.unsplash.com/collection/4994391/1980x1080' }}" class="w-full absolute inset-0">
                            </div>

                            <div class="flex items-center">
                                <a href="{{ route('blog.category', ['category' => $post->category->slug]) }}" class="text-sm bg-gray-200 text-gray-800 hover:text-gray-800 px-3 font-medium leading-6 rounded-full">
                                    {{ '#' . (isset($post->category->name) ? $post->category->name : 'Uncategorized') }}
                                </a>
                            </div>

                            <a class="mt-4 block" href="{{ $post->path() }}" title="{{ $post->title }}">
                                <h3 class="font-bold text-gray-800 text-2xl">{{ $post->title }}</h3>
                            </a>

                            <div class="mt-4 leading-relaxed">
                                {!! get_excerpt($post->body) !!}
                            </div>

                            <div class="mt-4">
                                <a href="{{ $post->path() }}">
                                    Read more <span class="ml-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <span class="text-gray-600 font-medium flex items-center">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>

                        <span class="ml-2">
                            No posts to show.
                        </span>
                    </span>
                </div>
            @endforelse
        </div>
    </section>

    <section class="py-16">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
