@extends('layouts.web.base')

@section('content')
    <section class="py-16 bg-white">
        <div class="container">
            <div class="row items-center">
                <div class="col-lg-7 col-md-6 mb-6 md:mb-0">
                    <h2 class="text-gray-800 font-bold text-3xl">Highlights / Updates</h2>

                    <h6 class="font-medium max-w-lg">Get in touch with latest news and updates.</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-12 my-10">
                    <div class="h-1 border-t border-gray-300"></div>
                </div>

                @forelse ($announcements as $announcement)
                <div class="col-lg-12 col-sm-12 mb-8 flex flex-col">
                    <ul class="list-disc pl-5">
                        <li>
                            <strong>{{$announcement->date}}</strong> : {{$announcement->description}} 
                            @if ($announcement->category == "New")
                            <span class="text-sm bg-green-200 text-green-800 hover:text-green-800 px-3 font-medium leading-6 rounded-full">
                                New
                            </span>
                            @elseif ($announcement->category == "Hot")
                            <span class="text-sm bg-red-200 text-red-800 hover:text-green-800 px-3 font-medium leading-6 rounded-full">
                                Hot
                            </span>
                            @endif
                        </li>
                    </ul>
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
        </div>
    </section>

    <section class="py-16">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
