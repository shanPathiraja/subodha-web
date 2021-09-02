@extends('layouts.web.base')

@section('content')
    <section id="main-hero" class="bg-gray-900 min-h-screen py-12 sm:py-0">
        <div class="container min-h-screen flex flex-col">
            <div class="my-24 row justify-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="flex flex-col md:flex-row">
                        <div>
                            <div class="h-48 w-48 rounded-full overflow-hidden mx-auto md:mx-0 shadow-md">
                                <img class="h-48 w-48" src="{{ asset('img/profile.png') }}">
                            </div>
                        </div>

                        <div class="ml-0 mt-6 md:mt-0 md:ml-10 text-center md:text-left">
                            <span class="text-gray-500">Ayubowan!</span>

                            <h3 class="text-3xl text-white"><span class="font-thin">Subodha</span> <span class="font-semibold">Charles</span></h3>

                            <p class="mt-4 text-gray-400">
                                Subodha is a faculty member at the Department of Electronic and Telecommunication Engineering, University of Moratuwa, researching on hardware security and trust, embedded systems and computer architecture.
                            </p>

                            <p class="mt-4 text-gray-400">
                            He is also a co-founder and a member of the board of a Solar PV system installation company based in Sri Lanka. The company has currently invested in other ventures such as a healthcare center in Sri Lanka, a construction firm and a digital marketing company.
                            </p>

                            <div class="mt-4">
                                <a href="https://subodhacharles.net/about" class="text-white font-semibold hover:text-blue-200 focus:text-blue-200">Read More <span class="ml-1">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-12">
                <div class="col-lg-4 mb-10 lg:mb-0 flex flex-col">
                    <div class="flex flex-col flex-1 justify-between bg-gray-800 bg-opacity-50 rounded-lg shadow px-4 py-5 sm:px-6">
                        <div>
                            <div>
                                <div class="relative h-20 w-20 rounded-full bg-blue-900 flex items-center justify-center">
                                    <i class="fas fa-atom text-5xl text-blue-500"></i>
                                </div>
                            </div>

                            <h3 class="mt-6 text-2xl text-white">Researcher</h3>

                            <h6 class="text-xs uppercase tracking-wider font-medium">Hardware Security and Trust | Embedded Systems | Computer Architecture</h6>

                            <p class="mt-4 text-gray-500 text-sm">
                                Subodha’s research work explores how cryptography and machine learning techniques can be utilized to ensure security in resource-constrained embedded and IoT devices. He has published in several top conferences/journals during his short time in the field.
                            </p>
                        </div>

                        <div class="mt-10">
                            <a class="text-sm" href="/publications">View publications <span class="ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-10 lg:mb-0 flex flex-col">
                    <div class="flex flex-col flex-1 justify-between bg-gray-800 bg-opacity-50 rounded-lg shadow px-4 py-5 sm:px-6">
                        <div>
                            <div>
                                <div class="relative h-20 w-20 rounded-full bg-blue-900 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-5xl text-blue-500"></i>
                                </div>
                            </div>

                            <h3 class="mt-6 text-2xl text-white">Entrepreneur</h3>

                            <h6 class="text-xs uppercase tracking-wider font-medium">Energy Solutions | Health care | Construction</h6>

                            <p class="mt-4 text-gray-500 text-sm">
                                Subodha launched a startup with his colleagues focusing on the energy sector of Sri Lanka in 2013 and is now serving as a member of the board. His company – Alta Vision (Pvt) Ltd is contributing more than 6MW of power to the national grid through Solar PV systems. The company has invested in other ventures such as a health care center in Sri Lanka, a construction firm and a digital marketing company.
                            </p>
                        </div>

                        <div class="mt-10">
                            <a class="text-sm" href="/entrepreneur">Read more <span class="ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-10 lg:mb-0 flex flex-col">
                    <div class="flex flex-col flex-1 justify-between bg-gray-800 bg-opacity-50 rounded-lg shadow px-4 py-5 sm:px-6">
                        <div>
                            <div>
                                <div class="relative h-20 w-20 rounded-full bg-blue-900 flex items-center justify-center">
                                    <i class="fas fa-hands-helping text-5xl text-blue-500"></i>
                                </div>
                            </div>

                            <h3 class="mt-6 text-2xl text-white">Volunteer</h3>

                            <h6 class="text-xs uppercase tracking-wider font-medium">IEEE</h6>

                            <p class="mt-4 text-gray-500 text-sm">
                                Subodha has been involved in IEEE since 2011 starting as a student member. He played a major role in uplifting IEEE activities in Sri Lanka and he was recognised as the best student volunteer in Asia Pacific region in 2015. He is currently serving as the Member at Large in IEEE Entrepreneurship steering committee and as a member of the IEEE MGA Student Activities Committee.
                            </p>
                        </div>

                        <div class="mt-10">
                            <a class="text-sm" href="/volunteer">View volunteer experiences <span class="ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex flex-col md:flex-row justify-start md:justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-2xl">Highlights / Updates</h3>

                            <h6 class="font-medium max-w-lg">Latest news and updates. </h6>
                        </div>

                        <div class="mt-4 lg:mt-0">
                            <a href="/highlights">View all <span class="ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-12">

            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-8 flex flex-col">
                    <ul class="list-disc pl-5">
                        @foreach ($announcements as $announcement)
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
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-900">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex flex-col md:flex-row justify-start md:justify-between">
                        <div>
                            <h3 class="font-bold text-white text-2xl">Recent Publications</h3>

                            <h6 class="font-medium max-w-lg">Outcomes of staring at a screen and trying to make sense out of it. </h6>
                        </div>

                        <div class="mt-4 lg:mt-0">
                            <a href="{{ route('publications.papers') }}">View all <span class="ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-12">

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

                                        <div class="mt-1">
                                            <small>{{ $paper->venue }}</small>
                                        </div>

                                        <div class="mt-4">
                                            {{join(", ",$paper->authors)}}
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-between items-baseline">
                                        <a class="text-sm" href="{{ $paper->path() }}">Continue reading <span class="ml-1">&rarr;</span></a>

                                        <span class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($paper->date)->format('F j, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex flex-col md:flex-row justify-start md:justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-2xl">Recent Blog Posts</h3>

                            <h6 class="font-medium max-w-lg">Latest articles about art, sports and other random thoughts.</h6>
                        </div>

                        <div class="mt-4 lg:mt-0">
                            <a href="{{ route('blog.posts') }}">View all <span class="ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-12">

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ $post->path() }}" class="block group rounded-lg overflow-hidden shadow mb-6">
                            <div class="bg-gray-900 bg-center bg-cover h-48 group" style="background-image: url({{ $post->image ?? 'https://source.unsplash.com/collection/4994391/1980x1080' }})">
                                <div class="bg-gray-800 hover:bg-opacity-25 bg-opacity-75 h-full w-full px-4 py-5 sm:px-6 flex items-end transition duration-150 ease-in-out">
                                    <div>
                                        <div>
                                            <h4 class="font-bold text-white">{{ $post->title }}</h4>

                                            <p class="mt-1 text-xs text-gray-300">
                                                {!! get_excerpt($post->body, 100) !!}
                                            </p>
                                        </div>

                                        <div class="mt-4 flex items-baseline justify-between">
                                            <span class="text-xs text-white">
                                                {{ '#' . (isset($post->category->name) ? $post->category->name : 'Uncategorized') }}
                                            </span>

                                            <span class="text-xs text-gray-300">{{ \Carbon\Carbon::parse($post->date)->format('F j, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection

@push('scripts')
    <script src="{{ asset('js/animations/three.js') }}"></script>
    <script src="{{ asset('js/animations/net.js') }}"></script>
    <script>
        VANTA.NET({
            el: "#main-hero",
            mouseControls: true,
            touchControls: true,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            points: 13.00,
            maxDistance: 23.00,
            spacing: 19.00,
            color: 0x023D80,
            backgroundColor: 0x1A202C,
        })
    </script>
@endpush
