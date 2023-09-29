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
    <article itemscope itemtype="https://schema.org/Article" class="article article-details">
        <div class="article__info">
            <time datetime="{{ $article->created_at->toIso8601String() }}" class="article__date">{{ $article->publishDate() }}</time>
            <meta itemprop="datePublished" content="{{ $article->created_at->toIso8601String() }}">
            <meta itemprop="dateModified" content="{{ $article->updated_at->toIso8601String() }}">
            <p class="article__author">
                <span>&nbsp;by </span>
                <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <a class="link link--blue" itemprop="url" href="https://a-kryvenko.com/">
                        <span itemprop="name">Andriy Kryvenko</span>
                    </a>
                </span>
            </p>
        </div>
        <div class="article__tags">
            <x-article-tag-list :article="$article"/>
        </div>
        <div itemprop="articleBody" class="article-details__text content">{!! $article->detail_text !!}</div>
    </article>
</x-app-layout>
