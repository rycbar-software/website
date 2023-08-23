<x-app-layout>
    <x-slot:h1>{{ $article->name }}</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $article) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo()->for($article) !!}</x-slot:seo>
    @can('edit article')
        <x-forms.buttons.edit href="{{ route('articles.edit', [$article]) }}"></x-forms.buttons.edit>
    @endcan
    <article>
        <p class="text-sm md:text-base font-normal text-gray-600">{{ $article->publishDate() }}</p>
        <div>{!! $article->detail_text !!}</div>
    </article>
</x-app-layout>