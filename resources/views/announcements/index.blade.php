@extends('layouts.app.base')

@section('content')
    <section class="py-6 bg-white border-b border-gray-300">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h3 class="text-gray-800 font-bold text-2xl">All Announcements</h3>

                            <h6 class="font-medium text-sm">Showing all announcements ordered by last updated</h6>
                        </div>

                        <div class="flex items-center ml-auto">
                            <a href="{{ route('announcements.create') }}" role="button" class="btn btn-primary pull-right">
                                Create Announcement
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container">
            @forelse ($announcements as $announcement)
                <div class="row">
                    <div class="col-md-3 mb-6">
                        <a href="{{ route('announcements.index', ['updated' => $announcement->updated_at]) }}" class="text-gray-700 font-medium">{{ $announcement->updated_at->toFormattedDateString() }}</a>
                    </div>

                    <div class="col-md-9 mb-6">
                        <div class="mb-10">
                            <div class="flex flex-col lg:flex-row items-start justify-between">
                                <a href="{{ route('announcements.edit', $announcement) }}" title="{{ $announcement->date }}">
                                    <h4 class="font-bold text-gray-800 text-xl">{{ $announcement->date }}</h4>
                                </a>

                                <div class="ml-0 lg:ml-6 whitespace-no-wrap">
                                    <a href="{{ route('announcements.edit', $announcement) }}" class="mr-3 text-sm">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil h-4 w-4 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                          <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                        </svg>
                                    </a>

                                    <a href="#" class="mr-3 text-sm text-red-500 hover:text-red-600" data-toggle="modal" data-target="#deleteModal{{ $announcement->id }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill h-4 w-4 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <p class="mt-4 max-w-xl">
                                {!! get_excerpt($announcement->description) !!}
                            </p>

                            <div class="mt-4 flex items-center">
                                @if ($announcement->published)
                                    <span class="text-sm bg-green-200 text-green-800 hover:text-green-800 px-3 font-medium leading-6 rounded-full">
                                        Published
                                    </span>
                                @else
                                    <span class="text-sm bg-yellow-200 text-yellow-800 hover:text-yellow-800 px-3 font-medium leading-6 rounded-full">
                                        Draft
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Delet Post Modal -->
                <div class="modal fade" id="deleteModal{{ $announcement->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $announcement->id }}Label" aria-hidden="true">
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
                                        <h5 class="modal-title text-lg font-bold text-gray-800 mt-2 mb-3" id="deleteModal{{ $announcement->id }}Label">Delete Announcement</h5>

                                        <p class="text-sm text-gray-600 mb-2 max-w-sm">
                                            Are you sure you want to delete this announcement? This action cannot be undone.
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

                                <form class="flex w-full rounded-lg shadow-sm sm:ml-2 sm:w-auto mt-0" method="POST" action="{{ route('announcements.destroy', $announcement) }}">
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
                            No announcements to show. <a href="{{ route('announcements.create') }}" class="text-blue-500 hover:text-blue-600">Create new</a>.
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
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
