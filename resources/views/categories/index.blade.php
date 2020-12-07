@extends('layouts.app.base')

@section('content')
    <section class="py-6 bg-white border-b border-gray-300">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h3 class="text-gray-800 font-bold text-2xl">All Categories</h3>

                            <h6 class="font-medium text-sm">Showing all available categories</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="container">
            <categories></categories>
        </div>
    </section>
@endsection
