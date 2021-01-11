<div>
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
            <button class="btn btn-primary" type="submit">{{ $post->id ? 'Save changes' : 'Create post' }}</button>

            <a href="/posts" class="ml-3 btn btn-secondary" type="submit">Cancel</a>
        </div>


        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
            <label class="flex items-center px-3 py-2 rounded-lg bg-gray-200">
                <input type="checkbox" class="form-checkbox bg-white" value="1" id="published" name="published" @if ($post->published) checked @endif>

                <span class="ml-3 font-semibold text-sm">Publish</span>
            </label>

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
                            @if ($post->image)
                            <div class="relative h-40 bg-gray-200 w-full rounded-lg overflow-hidden mb-4">
                                <img src="{{ $post->image }}" class="w-full absolute inset-0">
                            </div>
                            @endif

                            <div>
                                <image-uploader featured="{{$post->image}}"></image-uploader>
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

            <label class="ml-3 block">
                <select name="category_id" id="category_id" class="form-select mt-1 block w-full bg-white border-none shadow">
                    @foreach ($categories as $category)
                    <option @if ($category->is($post->category)) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    </div>

    <div class="mt-6">
        <input id="title" type="text" class="form-input bg-white block w-full border-none py-4 px-5 text-xl font-bold" name="title" placeholder="Give your post a title..." value="{{ old('title', $post->title) }}" />
    </div>

    <div class="mt-12">
        <label class="block">
            <span class="text-gray-700 text-sm font-semibold">Date *</span>
            <input id="title" type="date" class="form-input bg-white block w-full border-none py-4 px-5 text-xl font-bold" name="date" placeholder="Enter date for the post" value="{{ old('date', $post->date) }}" required />
        </label>
    </div>

    <div class="mt-6">
        <div class="rounded-lg overflow-hidden">
            <textarea name="body" id="body" class="rounded-lg" hidden>{{ old('body', $post->body) }}</textarea>
        </div>
    </div>
</div>