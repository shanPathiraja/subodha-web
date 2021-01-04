<div>
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
            <button class="btn btn-primary" type="submit">{{ $paper->id ? 'Save changes' : 'Create paper' }}</button>

            <a href="/papers" class="ml-3 btn btn-secondary" type="submit">Cancel</a>
        </div>

        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
            <div class="flex items-center rounded-lg bg-gray-200 p-px">
                <label class="block">
                    <select name="category_id" id="category_id" class="form-select block w-full bg-white border-none">
                        @foreach ($categories as $category)
                            <option @if ($category->is($paper->category)) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="ml-3 flex items-center px-3 py-2 rounded-lg bg-gray-200">
                    <input type="checkbox" class="form-checkbox bg-white" value="1" id="published" name="published" @if ($paper->published) checked @endif>

                    <span class="ml-3 font-semibold text-sm">Publish</span>
                </label>
            </div>

            <div class="ml-3 flex items-center">
                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#information">
                    Paper information
                </button>
            </div>

            <div class="modal fade" id="information" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="informationLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-bold text-gray-800 font-bold text-xl" id="informationLabel">Information Regarding The Paper</h5>

                            <button type="button" class="close font-normal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body pb-0">
                            <div>
                                <label class="block">
                                    <span class="text-gray-700 text-sm font-semibold">Venue</span>

                                    <input name="venue" id="venue" type="text" class="form-input mt-1 block w-full @error('venue') placeholder-red-500 border-red-300 bg-red-100 @enderror" required value="{{ old('venue') ?? ($paper->venue ?? null) }}">
                                </label>

                                @error('venue')
                                    <div class="mt-2" role="alert">
                                        <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <authors :saved-authors="{{ json_encode($paper->authors ?: []) }}"></authors>
                            </div>
                        </div>

                        <div class="modal-footer justify-end items-baseline">
                            <button type="button" class="ml-4 inline-block btn btn-primary" data-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ml-3 flex items-center">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#featuredImage">
                    <i class="fas fa-image"></i>
                </button>
            </div>

            <div class="modal fade" id="featuredImage" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="featuredImageLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-bold text-gray-800 font-bold text-xl" id="featuredImageLabel">Add Featured Image</h5>

                            <button type="button" class="close font-normal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body pb-0">
                            @if ($paper->image)
                                <div class="relative h-40 bg-gray-200 w-full rounded-lg overflow-hidden mb-4">
                                    <img src="{{ $paper->image }}" class="w-full absolute inset-0">
                                </div>
                            @endif

                            <div>
                                <image-uploader></image-uploader>
                            </div>
                        </div>

                        <div class="modal-footer justify-center items-baseline pt-0">
                            <div class="flex items-end justify-between">
                                <span class="text-xs text-gray-500">
                                    Please wait for the uploading view to turn green before closing the modal. Make sure the image you add is under <span class="font-semibold">5MB</span> and is of type <span class="font-semibold">PNG/JPG/JPEG</span>.
                                </span>

                                <button type="button" class="ml-4 inline-block btn btn-primary" data-dismiss="modal">Done</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <input id="title" type="text" class="form-input bg-white block w-full border-none py-4 px-5 text-xl font-bold" name="title" placeholder="Give your paper a title..." value="{{ old('title', $paper->title) }}" />
    </div>

    <div class="mt-12">
        <label class="block">
            <span class="text-gray-700 text-sm font-semibold">Date *</span>
            <input id="title" type="date" class="form-input bg-white block w-full border-none py-4 px-5 text-xl font-bold" name="date" placeholder="Enter date for the paper" value="{{ old('date', $paper->date) }}" required />
        </label>
    </div>

    <div class="mt-6">
        <label class="block">
            <span class="text-gray-700 text-sm font-semibold">Download Link for Publication</span> 
            <input id="download_link" type="url" class="form-input block w-full" name="download_link" placeholder="Enter Download Link for the Publication" value="{{ old('download_link', $paper->download_link) }}" />
        </label>
    </div>

    <div class="mt-12">
        <div class="rounded-lg overflow-hidden">
            <textarea name="body" id="body" class="rounded-lg" hidden>{{ old('body', $paper->body) }}</textarea>
        </div>
    </div>

    
</div>
