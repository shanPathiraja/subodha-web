<label class="block">
    <span class="text-gray-700 text-sm font-semibold">{{ __('Category') }}</span>

    <select name="category_id" id="category_id" class="form-select mt-1 block w-full @error('category_id') placeholder-red-500 border-red-300 bg-red-100 @enderror">
        <option>Complete package</option>
        <option>Web marketing</option>
        <option>Web portal</option>
        <option>iOS</option>
        <option>Android</option>
    </select>
</label>

@error('category_id')
    <div class="mt-1" role="alert">
        <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
    </div>
@enderror
