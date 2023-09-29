<x-app-layout>
    <x-slot:h1>Articles</x-slot:h1>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @if (!empty($tags))
        <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $tags) }}</x-slot:breadcrumbs>
    @endif
    @can('create article')
        <x-forms.buttons.add href="{{ route('articles.create') }}"></x-forms.buttons.add>
    @endcan
    <div class="articles-page">
        <section itemscope itemtype="https://schema.org/ItemList" class="articles-page__list">
            @foreach($articles as $article)
                <article class="article" itemprop="itemListElement" itemscope itemtype="https://schema.org/Article">
                    <a href="{{ route('articles.show', $article) }}"><h2 class="article__name" itemprop="headline">{{ $article->getName() }}</h2></a>
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
                    <div class="article__text content" itemprop="articleBody">{!! $article->preview_text !!}</div>
                    <div class="article__details">
                        <a href="{{ route('articles.show', $article) }}" class="link link--blue">Read more</a>
                    </div>
                </article>
            @endforeach
        </section>
        <aside class="articles-page__filter">
            <x-article-tag-filter/>
        </aside>
    </div>
    {{ $articles->links() }}
</x-app-layout>
