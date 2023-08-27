<x-app-layout>
    <x-slot:h1>{{ $article->getName() }}</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $article) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo()->for($article) !!}</x-slot:seo>
    @can('edit article')
        <div class="flex">
            <x-forms.buttons.edit href="{{ route('articles.edit', [$article]) }}"></x-forms.buttons.edit>
            <x-forms.buttons.delete action="{{ route('articles.destroy', [$article]) }}"></x-forms.buttons.delete>
        </div>
    @endcan
    <article>
        <p class="text-sm md:text-base font-normal text-gray-600">{{ $article->publishDate() }}</p>
        <div>{!! $article->detail_text !!}</div>
    </article>
</x-app-layout>
