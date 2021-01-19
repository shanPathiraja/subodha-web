<nav class="navbar navbar-expand-lg navbar-dark bg-gray-900 py-6 items-start lg:items-center">
    <div class="container">
        <!--
        <a class="block h-4" href="/">
            <img class="h-4 w-auto" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
        </a>
        -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto items-start lg:items-center">
                <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0 mt-6 lg:mt-0">
                    <a class="block text-gray-500 hover:text-gray-100 font-medium" href="{{ route('welcome') }}">Home</a>
                </li>

                <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                    <a class="block text-gray-500 hover:text-gray-100 font-medium" href="{{ route('publications.papers') }}">Researcher</a>
                </li>

                <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                    <a class="block text-gray-500 hover:text-gray-100 font-medium" href="/entrepreneur">Entrepreneur</a>
                </li>

                <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                    <a class="block text-gray-500 hover:text-gray-100 font-medium" href="{{ route('about') }}">About</a>
                </li>
                
                <!--
                <div class="dropdown text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                    <a href="#" class="dropdown-toggle block text-gray-500 hover:text-gray-100 font-medium" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>

                    <div class="bg-gray-800 dropdown-menu shadow-lg rounded-lg border-none mt-3" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item text-sm block text-gray-500 hover:text-gray-100 hover:bg-gray-700 focus:bg-gray-800 font-medium leading-5 py-2" href="{{ route('about') }}">Profile</a>

                        <a class="dropdown-item text-sm block text-gray-500 hover:text-gray-100 hover:bg-gray-700 focus:bg-gray-800 font-medium leading-5 py-2" href="{{ route('about', ['page' => 'entrepreneur']) }}">Entrepreneur</a>

                        <a class="dropdown-item text-sm block text-gray-500 hover:text-gray-100 hover:bg-gray-700 focus:bg-gray-800 font-medium leading-5 py-2" href="{{ route('about', ['page' => 'volunteer']) }}">Volunteer</a>
                    </div>
                </div>
                -->

                <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                    <a class="block text-gray-500 hover:text-gray-100 font-medium" href="{{ route('blog.posts') }}">Blog</a>
                </li>

                <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                    <a class="block text-gray-500 hover:text-gray-100 font-medium px-2 py-1 rounded-lg border border-gray-500 hover:border-gray-100" href="{{ route('resume') }}">
                        Resumé
                    </a>
                </li>

                @auth
                    <li class="text-sm font-thin nav-item ml-0 lg:ml-8 py-2 lg:py-0">
                        <a class="block text-gray-500 hover:text-gray-100 font-medium" href="{{ route('home') }}">
                            Dashboard <span class="ml-1">&rarr;</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
