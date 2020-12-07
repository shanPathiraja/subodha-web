@extends('layouts.app.base')

@section('content')
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-gray-800 font-bold text-2xl">Activity Log</h3>

                        <h6 class="font-medium text-sm">List of 100 recorded activity of <span class="font-bold">{{ user('name') }}</span></h6>
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
