<password inline-template>
    <label class="block">
        <span class="text-gray-700 text-sm font-semibold">Password</span>

        <input type="password" name="password" v-model="password" id="password" class="form-input mt-1 block w-full @error('password') placeholder-red-500 border-red-300 bg-red-100 @enderror" autocomplete="new-password" v-on:input="validatePassword" placeholder="iwillbeforgetful" required>

        <div class="flex items-center mt-2">
            <div class="flex-1 rounded-lg h-1" :class="strength > 0 ? 'bg-indigo-600' : 'bg-white'"></div>
            <div class="ml-1 rounded-lg flex-1 h-1" :class="strength > 1 ? 'bg-indigo-600' : 'bg-white'"></div>
            <div class="ml-1 rounded-lg flex-1 h-1" :class="strength > 2 ? 'bg-indigo-600' : 'bg-white'"></div>
            <div class="ml-1 rounded-lg flex-1 h-1" :class="strength > 3 ? 'bg-indigo-600' : 'bg-white'"></div>
        </div>
    </label>
</password>

@error('password')
    <div class="mt-2" role="alert">
        <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
    </div>
@enderror
