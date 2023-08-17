<x-app-layout>
    <x-slot:h1>{{ $article->name }}</x-slot:h1>
    <section>
        <p class="text-sm md:text-base font-normal text-gray-600">{{ $article->createdAt }}</p>
        <div>{!! $article->text !!}</div>
    </section>
</x-app-layout>
