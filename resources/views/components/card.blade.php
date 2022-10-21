<article class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
    <a href="{{ route('posts.show', $post) }}">
        <img class="w-full h-72 rounded-t-lg object-cover object-center" src="@if($post->image) {{ Storage::url($post->image->url) }} @else {{ Storage::url('posts/venice.jpg') }} @endif" alt="Post">
    </a>
    <div class="p-5">
        <a href="{{ route('posts.show', $post) }}">
            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->name }}</h3>
        </a>
        <div class="mb-3 font-normal text-gray-700">{!! $post->extract !!}</div>
        @foreach($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="inline-flex items-center mr-2 py-1 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
</article>
