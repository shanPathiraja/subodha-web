<div>
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
            <button class="btn btn-primary" type="submit">{{ $announcement->id ? 'Save changes' : 'Create announcement' }}</button>

            <a href="/announcements" class="ml-3 btn btn-secondary" type="submit">Cancel</a>
        </div>

        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
            <div class="flex items-center rounded-lg bg-gray-200 p-px">
                <label class="block">
                    <select name="category" class="form-select block w-full bg-white border-none">
                        <option {{$announcement->category ? '' : 'selected'}} value="None">None</option>
                        <option {{$announcement->category=="New" ? 'selected' : ''}} value="New">New</option>
                        <option {{$announcement->category=="Hot" ? 'selected' : ''}} value="Hot">Hot</option>
                    </select>
                </label>
                
                <label class="ml-3 flex items-center px-3 py-2 rounded-lg bg-gray-200">
                    <input type="checkbox" class="form-checkbox bg-white" value="1" id="published" name="published" @if ($announcement->published) checked @endif>

                    <span class="ml-3 font-semibold text-sm">Publish</span>
                </label>
            </div>
        </div>
    </div>

    <div class="mt-12">
        <label class="block">
            <span class="text-gray-700 text-sm font-semibold">Date</span> 
            <input id="title" type="date" class="form-input block w-full" name="date" placeholder="Enter date for the announcement" value="{{ old('date', $announcement->date) }}" />
        </label>
    </div>

    <div class="mt-6">
        <div class="rounded-lg overflow-hidden">
            <label class="block">
                <span class="text-gray-700 text-sm font-semibold">Description</span> 
                <textarea name="description" id="body" class="form-input block w-full" rows="5">{{ old('description', $announcement->description) }}</textarea>
            </label>
        </div>
    </div>
</div>