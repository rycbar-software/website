<x-app-layout>
    <x-slot:h1>Articles</x-slot:h1>
    @foreach($articles as $article)
        <section>
            <h2><a href="{{ route('articles.show', $article) }}">{{ $article->name }}</a></h2>
            <p class="text-sm md:text-base font-normal text-gray-600">{{ $article->createdAt }}</p>
            <div>{!! $article->preview_text !!}</div>
        </section>
    @endforeach
</x-app-layout>
