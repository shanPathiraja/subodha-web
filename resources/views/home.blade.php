@extends('layouts.app.base')

@section('content')
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 mb-6">
                            <div class="rounded-lg bg-gray-100 px-4 py-5 sm:px-6 leading-none">
                                <div class="lg:flex lg:items-start lg:justify-between">
                                    <div class="lg:flex lg:items-center lg:justify-between mb-6 lg:mb-0">
                                        <div class="mr-4 mb-6 lg:mb-0">
                                            <img class="h-20 w-20 rounded-full" src="{{ user('photo') }}" alt="{{ user('name') }}" />
                                        </div>

                                        <div class="flex-1 min-w-0">
                                            <div>
                                                <h6 class="text-sm text-gray-600">
                                                    {{ greet() . ',' . ' it is now ' . date('g:i a') }}
                                                </h6>

                                                <h2 class="text-xl font-bold text-gray-800 sm:text-2xl leading-tight">
                                                    {{ user('name') }}
                                                </h2>
                                            </div>

                                            <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                                                <div class="mt-2 flex items-center text-sm text-gray-600 sm:mr-6">
                                                    <svg class="flex-shrink-0 mr-2 h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>

                                                    {{ user('email') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="btn btn-secondary shadow-sm text-xs leading-7 px-3" href="{{ route('users.edit', user()) }}">Edit profile</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-6 mb-6">
                            <div class="rounded-lg bg-gray-100 px-4 py-5 sm:px-6 leading-none">
                                <div class="text-xs uppercase font-semibold">Visitors</div>

                                <h2 class="mt-2 text-4xl text-gray-800">{{ $analytics['totalVisits'] }}</h2>

                                <div class="mt-2 text-xs text-blue-500">{{ $analytics['totalViews'] . ' Page views' }}</div>
                            </div>
                        </div>

                        <div class="col-md-4 col-6 mb-6">
                            <div class="rounded-lg bg-gray-100 px-4 py-5 sm:px-6 leading-none">
                                <div class="text-xs uppercase font-semibold">Posts</div>

                                <h2 class="mt-2 text-4xl text-gray-800">{{ $analytics['posts']['count'] }}</h2>

                                <div class="mt-2 text-xs text-blue-500">{{ $analytics['posts']['published'] }} Published</div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-6">
                            <div class="rounded-lg bg-gray-100 px-4 py-5 sm:px-6 leading-none">
                                <div class="text-xs uppercase font-semibold">Papers</div>

                                <h2 class="mt-2 text-4xl text-gray-800">{{ $analytics['papers']['count'] }}</h2>

                                <div class="mt-2 text-xs text-blue-500">{{ $analytics['papers']['published'] }} Published</div>
                            </div>
                        </div>

                        <div class="col-12 mb-6">
                            <div class="rounded-lg bg-gray-100 px-4 py-5 sm:px-6">
                                <div class="text-xs uppercase font-semibold">Visitors past 7 days</div>

                                <visitors class="-ml-4 -mb-4 mt-2" :keys="{{ $analytics['visitors']->keys() }}" :values="{{ $analytics['visitors']->values() }}"></visitors>
                            </div>
                        </div>

                        <div class="col-12 mb-6">
                            <div class="rounded-lg bg-gray-100 px-4 py-5 sm:px-6 leading-none">
                                <div>
                                    <h5 class="text-gray-800 font-bold text-base">Quick Links</h5>
                                </div>

                                <ul class="mt-4">
                                    <li class="mb-2">
                                        <a class="text-sm block" href="{{ route('posts.create') }}">Write new blog post</a>
                                    </li>

                                    <li class="mb-2">
                                        <a class="text-sm block" href="{{ route('papers.create') }}">Publish new research paper</a>
                                    </li>

                                    <li class="mb-2">
                                        <a class="text-sm block" href="{{ route('users.edit', user()) }}">Edit profile details</a>
                                    </li>

                                    <li class="mb-2">
                                        <a class="text-sm block" href="/">Visit website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h5 class="text-gray-800 font-bold text-base">Activity Feed</h5>

                            <h6 class="text-gray-600 text-xs">Only showing 7 of the most recent</h6>
                        </div>

                        <a class="text-sm" href="{{ route('activities') }}">View all</a>
                    </div>

                    <hr class="my-6">

                    <div>
                        @forelse ($activities as $date => $feed)
                            <div>
                                <span class="text-gray-600 text-xs uppercase font-semibold">{{ $date }}</span>
                            </div>

                            <div class="my-4">
                                @foreach ($feed as $item)
                                    <div class="mb-8 px-4 py-5 sm:px-6 rounded-lg bg-gray-100">
                                        <div class="text-sm">
                                            @include('components.activity.types.' . $item->type, ['item' => $item])
                                        </div>

                                        <div class="flex justify-end text-xs">
                                            <div>
                                                <span class="text-gray-600">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div>
                                <span class="text-gray-600 font-medium flex items-start">
                                    <span class="h-4 w-4 block">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle h-4 w-4 mt-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                        </svg>
                                    </span>

                                    <span class="ml-2 text-sm">
                                        No activities to show. Get started by <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-600">creating a new blog post</a>.
                                    </span>
                                </span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
