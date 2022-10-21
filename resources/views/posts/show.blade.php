<x-app-layout>
    <x-slot:title>{{ $post->name }}</x-slot>
    <x-navbar />

    <div class="container mx-auto py-8">
        <h2 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h2>

        <div class="max-w-[845.33px] mb-2 pt-3 text-lg text-gray-500">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <img class="w-full h-80 object-cover object-center" src="@if($post->image) {{ Storage::url($post->image->url) }} @else {{ Storage::url('posts/venice.jpg') }} @endif" alt="Post">
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>
            <aside>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">More in {{ $post->category->name }}</h3>
                <ul>
                    @foreach ($relatedPosts as $relatedPost)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $relatedPost) }}">
                                <img class="min-w-[144px] h-20 object-cover object-center" src="@if($relatedPost->image) {{ Storage::url($relatedPost->image->url) }} @else {{ Storage::url('posts/venice.jpg') }} @endif" alt="Related post">
                                <span class="ml-2 text-gray-600">{{ $relatedPost->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>

</x-app-layout>
