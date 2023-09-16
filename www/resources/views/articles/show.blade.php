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
    <article itemscope itemtype="https://schema.org/Article" class="article-details">
        <meta itemprop="datePublished" content="{{ $article->created_at->toIso8601String() }}">
        <p class="article-details__date">{{ $article->publishDate() }}</p>
        <p class="article-details__author"><span>By </span><a href="https://a-kryvenko.com/" itemprop="author">Andriy Kryvenko</a></p>
        <div itemprop="articleBody" class="article-details__text">{!! $article->detail_text !!}</div>
    </article>
</x-app-layout>
