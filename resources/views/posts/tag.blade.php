<x-app-layout>
    <x-slot:title>{{ $tag->name }}</x-slot>
    <x-navbar />

    <div class="container mx-auto px-2 py-10">

        <h2 class="text-4xl text-gray-600 text-center">
            Tagged: {{ $tag->name }}
        </h2>

        <div class="md:grid-cols-2 lg:grid-cols-3 grid justify-items-center grid-cols-1 gap-6 pt-6">
            @foreach($posts as $post)
                <x-card :post="$post" />
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
