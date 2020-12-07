<nav class="bg-gray-900 py-4 h-16 flex items-center justify-center">
    <div class="container">
        <div class="flex items-center justify-between">
            <a href="/" class="block h-3 flex-shrink-0">
                <img class="h-3" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
            </a>

            <div class="flex-1 items-center ml-10 flex">
                <div class="hidden lg:flex items-center mr-auto">
                    <a href="/home" class="{{ is_active('home', 'text-white bg-gray-800', 'text-gray-300') }} px-3 rounded-lg text-sm font-medium leading-9 hover:text-white hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out">{{ __('Dashboard') }}</a>

                    <div class="dropdown ml-4 leading-9">
                        <a href="#" class="{{ is_active('posts*', 'text-white bg-gray-800', 'text-gray-300') }} inline-block px-3 rounded-lg text-sm font-medium leading-9 hover:text-white hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Posts') }}</a>

                        <div class="dropdown-menu dropdown-menu-right shadow-lg rounded-lg border-none mt-2" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('posts.index') }}">{{ __('All posts') }}</a>

                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('posts.create') }}">{{ __('New post') }}</a>

                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                        </div>
                    </div>

                    <div class="dropdown ml-4 leading-9">
                        <a href="#" class="{{ is_active('papers*', 'text-white bg-gray-800', 'text-gray-300') }} inline-block px-3 rounded-lg text-sm font-medium leading-9 hover:text-white hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Papers') }}</a>

                        <div class="dropdown-menu dropdown-menu-right shadow-lg rounded-lg border-none mt-2" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('papers.index') }}">{{ __('All papers') }}</a>

                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('papers.create') }}">{{ __('New research paper') }}</a>

                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                        </div>
                    </div>

                    {{-- <a href="#" class="{{ is_active('report', 'text-white bg-gray-800', 'text-gray-300') }} ml-4 px-3 rounded-lg text-sm font-medium leading-9 hover:text-white hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out">{{ __('Reports') }}</a> --}}

                    <a href="/" class="{{ is_active('website', 'text-white bg-gray-800', 'text-gray-300') }} ml-4 px-3 rounded-lg text-sm font-medium leading-9 hover:text-white hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out">{{ __('Website') }}</a>
                </div>

                <div class="flex items-center ml-auto">
                    <a href="{{ route('posts.create') }}" class="hidden lg:inline-block whitespace-no-wrap ml-4 px-3 rounded-lg text-sm font-medium leading-9 text-white hover:text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:text-white focus:bg-blue-600 transition duration-150 ease-in-out">{{ __('New blog post') }}</a>

                    <div class="block lg:hidden dropdown">
                        <a class="dropdown-toggle text-gray-300 hover:text-white focus:outline-none focus:text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow-lg rounded-lg border-none mt-2" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">Dashboard</a>
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">Website</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">All posts</a>
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">New posts</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">All papers</a>
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">New papers</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="#">Categories</a>
                        </div>
                    </div>

                    <div class="dropdown ml-4">
                        <a class="dropdown-toggle h-8 w-8 block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="h-8 w-8 rounded-full" src="{{ user('photo') }}" alt="" />
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow-lg rounded-lg border-none mt-2" aria-labelledby="dropdownMenuLink">
                            {{-- <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('users.show', user()) }}">{{ __('Profile') }}</a> --}}

                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('users.edit', user()) }}">{{ __('Settings') }}</a>

                            <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('signout-form').submit();">
                                {{ __('Sign out') }}
                            </a>

                            <form id="signout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
