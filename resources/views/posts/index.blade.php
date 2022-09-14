<x-admin-layout>
    <x-slot:title>Home</x-slot>
    <x-navbar />

    <div class="container mx-auto py-8">
        <div class="md:grid-cols-2 lg:grid-cols-3 grid grid-cols-1 gap-6">
            @foreach($posts as $post)
                <article style="background-image: url({{ Storage::url($post->image->url) }})" class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach($post->tags as $tag)
                                <a href="" class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h2 class="text-4xl text-white leading-8 font-bold">
                            <a href="">{{ $post->name }}</a>
                        </h2>
                    </div>
                </article>
            @endforeach
        </div>
        
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

</x-admin-layout>
