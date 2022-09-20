<x-app-layout>
    <x-slot:title>{{ $category->name }}</x-slot>
    <x-navbar />

    <div class="container mx-auto px-2 py-10">

        <h2 class="text-4xl text-gray-600 text-center">
            Category: {{ $category->name }}
        </h2>

        <div class="md:grid-cols-2 lg:grid-cols-3 grid justify-items-center grid-cols-1 gap-6 pt-6">
            @foreach($posts as $post)
                <article class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                    <a href="{{ route('posts.show', $post) }}">
                        <img class="w-full h-72 rounded-t-lg object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="Post">
                    </a>
                    <div class="p-5">
                        <a href="{{ route('posts.show', $post) }}">
                            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->name }}</h3>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->extract }}</p>
                        @foreach($post->tags as $tag)
                            <a href="#" class="inline-flex items-center mr-2 py-1 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
