<p class="text-gray-600">
    <span class="font-semibold text-gray-700">{{ $item->username }}</span> updated blog post <a class="text-blue-500 hover:text-blue-600" href="{{ route('posts.edit', ['post' => $item->subject->slug]) }}">{{ $item->subject->title }}</a>
</p>
