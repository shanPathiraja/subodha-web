<section class="py-16 border-t border-gray-800 bg-gray-900">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-6 md:mb-0">
                <div>
                    <a class="block h-3" href="/">
                        <img class="h-3 w-auto" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
                    </a>
                </div>

                <p class="mt-4 text-xs text-gray-500 max-w-sm">
                    A researcher (University of Moratuwa), entrepreneur (<a href="https://www.pearlcluster.lk" target="_blank">Pearl Cluster</a>) and a volunteer (IEEE).
                </p>

                <ul class="mt-4 flex justify-start text-base">
                    <li class="mr-4">
                        <a class="font-normal text-gray-500" href="http://twitter.com/subodha96" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>

                    <li class="mr-4">
                        <a class="font-normal text-gray-500" href="http://instagram.com/subodha96" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>

                    <li class="mr-4">
                        <a class="font-normal text-gray-500" href="http://linkedin.com/in/subodha-charles" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>

                    <!--<li class="mr-4">
                        <a class="font-normal text-gray-500" href="http://fb.com/subodhacharles" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>-->
                </ul>
            </div>

            <div class="col-md-6">
                <div class="flex justify-start md:justify-end">
                    <ul>
                        <li class="mb-2">
                            <a class="text-xs uppercase tracking-wide font-semibold text-gray-500" href="/">
                                Home
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="text-xs uppercase tracking-wide font-semibold text-gray-500" href="/about">
                                About
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="text-xs uppercase tracking-wide font-semibold text-gray-500" href="/publications">
                                Publications
                            </a>
                        </li>

                        <li>
                            <a class="text-xs uppercase tracking-wide font-semibold text-gray-500" href="/blog">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-12 w-full h-px border-t border-gray-800"></div>

        @include('layouts.partials._copyrights')
    </div>
</section>
