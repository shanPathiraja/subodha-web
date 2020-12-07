@extends('layouts.app.base')

@section('content')
    <section class="py-6 bg-white border-b border-gray-300">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h3 class="text-gray-800 font-bold text-2xl">All Posts</h3>

                            <h6 class="font-medium text-sm">Showing all blog posts ordered by last updated</h6>
                        </div>

                        <div class="w-auto lg:w-2/5 flex items-center">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ request('category') ? request('category')->name : 'All' }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow-lg rounded-lg border-none mt-2" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('posts.index') }}">All</a>

                                    <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('posts.index', ['status' => 'published']) }}">Published</a>

                                    <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('posts.index', ['status' => 'draft']) }}">Drafts</a>

                                    @foreach ($categories as $category)
                                        <a class="dropdown-item text-sm font-medium leading-5 py-2" href="{{ route('posts.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <form class="flex-1 ml-4" action="{{ route('posts.index') }}" method="GET" accept-charset="utf-8">
                                <input type="text" name="search" id="search" class="form-input block w-full" placeholder="Search blog posts" value="{{ request('search') ?? null }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container">
            @forelse ($posts as $post)
                <div class="row">
                    <div class="col-md-3 mb-6">
                        <a href="{{ route('posts.index', ['updated' => $post->updated_at]) }}" class="text-gray-700 font-medium">{{ $post->updated_at->toFormattedDateString() }}</a>
                    </div>

                    <div class="col-md-9 mb-6">
                        <div class="mb-10">
                            @if ($post->image)
                                <div class="relative h-40 bg-gray-200 w-full rounded-lg overflow-hidden mb-4">
                                    <img src="{{ $post->image }}" class="w-full absolute inset-0">
                                </div>
                            @endif

                            <div class="flex flex-col lg:flex-row items-start justify-between">
                                <a href="{{ route('posts.edit', $post) }}" title="{{ $post->title }}">
                                    <h4 class="font-bold text-gray-800 text-xl">{{ $post->title }}</h4>
                                </a>

                                <div class="ml-0 lg:ml-6 whitespace-no-wrap">
                                    <a href="{{ route('posts.edit', $post) }}" class="mr-3 text-sm text-gray-700 hover:text-gray-800">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye h-4 w-4 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                          <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </a>

                                    <a href="{{ route('posts.edit', $post) }}" class="mr-3 text-sm">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil h-4 w-4 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                          <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                        </svg>
                                    </a>

                                    <a href="#" class="mr-3 text-sm text-red-500 hover:text-red-600" data-toggle="modal" data-target="#deleteModal{{ $post->id }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill h-4 w-4 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <p class="mt-4 max-w-2xl">
                                {!! get_excerpt($post->body) !!}
                            </p>

                            <div class="mt-4 flex items-center">
                                <a href="{{ route('posts.category', ['category' => $post->category->slug ?? 'uncategorized']) }}" class="text-sm bg-gray-200 text-gray-800 hover:text-gray-800 px-3 font-medium leading-6 rounded-full">
                                    {{ '#' . (isset($post->category->name) ? $post->category->name : 'Uncategorized') }}
                                </a>

                                @if ($post->published)
                                    <a href="{{ route('posts.index', ['status' => 'published']) }}" class="ml-3 text-sm bg-green-200 text-green-800 hover:text-green-800 px-3 font-medium leading-6 rounded-full">
                                        Published
                                    </a>
                                @else
                                    <a href="{{ route('posts.index', ['status' => 'draft']) }}" class="ml-3 text-sm bg-yellow-200 text-yellow-800 hover:text-yellow-800 px-3 font-medium leading-6 rounded-full">
                                        Draft
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delet Post Modal -->
                <div class="modal fade" id="deleteModal{{ $post->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $post->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered rounded-lg" role="document">
                        <div class="modal-content rounded-lg">
                            <div class="modal-body">
                                <div class="flex">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </div>

                                    <div class="ml-4">
                                        <h5 class="modal-title text-lg font-bold text-gray-800 mt-2 mb-3" id="deleteModal{{ $post->id }}Label">Delete Post</h5>

                                        <p class="text-sm text-gray-600 mb-2 max-w-sm">
                                            Are you sure you want to delete this post? All post related data will be permanantly removed. This action cannot be undone.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer bg-gray-100">
                                <span class="mt-3 flex w-full rounded-lg shadow-sm sm:mt-0 sm:w-auto">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cancel
                                    </button>
                                </span>

                                <form class="flex w-full rounded-lg shadow-sm sm:ml-2 sm:w-auto mt-0" method="POST" action="{{ route('posts.destroy', $post) }}">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if (! $loop->last)
                    <div class="row">
                        <div class="col-12">
                            <hr class="mb-16">
                        </div>
                    </div>
                @endif
            @empty
                <div>
                    <span class="text-gray-600 font-medium flex items-center">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>

                        <span class="ml-2">
                            No posts to show. <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-600">Create new</a>.
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
