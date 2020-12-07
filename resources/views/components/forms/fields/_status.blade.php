<label class="block">
    <span class="text-gray-700 text-sm font-semibold">{{ __('Status') }}</span>

    <select name="status_id" id="status_id" class="form-select mt-1 block w-full @error('status_id') placeholder-red-500 border-red-300 bg-red-100 @enderror">
        <option>Active</option>
        <option>Suspended</option>
        <option>Completed</option>
        <option>Deployed</option>
    </select>
</label>

@error('status_id')
    <div class="mt-1" role="alert">
        <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
    </div>
@enderror
