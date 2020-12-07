<p class="text-gray-600">
    <span class="font-semibold text-gray-700">{{ $item->username }}</span> created new paper <a class="text-blue-500 hover:text-blue-600" href="{{ route('posts.edit', ['post' => $item->subject->slug]) }}">{{ $item->subject->title }}</a>
</p>
