<x-app-layout>
    <x-slot:h1>Articles</x-slot:h1>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @if (!empty($tags))
        <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $tags) }}</x-slot:breadcrumbs>
    @endif
    @can('create article')
        <x-forms.buttons.add href="{{ route('articles.create') }}"></x-forms.buttons.add>
    @endcan
    <div class="flex">
        <section itemscope itemtype="https://schema.org/ItemList">
            @foreach($articles as $article)
                <article class="article" itemprop="itemListElement" itemscope itemtype="https://schema.org/Article">
                    <div class="article__info">
                        <p class="article__Status">{{ $article->isPublished() ? 'Published' : 'Draft' }}</p>
                        <time datetime="{{ $article->created_at->toIso8601String() }}" class="article__date">{{ $article->publishDate() }}</time>
                        <meta itemprop="datePublished" content="{{ $article->created_at->toIso8601String() }}">
                        <p class="article__author"><span>By </span><a class="link link--blue" href="https://a-kryvenko.com/" itemprop="author">Andriy Kryvenko</a></p>
                    </div>
                    <div class="article__content">
                        <a href="{{ route('articles.show', $article) }}"><h2 class="article__name" itemprop="name">{{ $article->getName() }}</h2></a>
                        <x-article-tag-list :article="$article"/>
                        <div class="article__text content" itemprop="articleBody">{!! $article->preview_text !!}</div>
                        <div class="article__details">
                            <a href="{{ route('articles.show', $article) }}" class="link link--blue">Read more</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
        <aside>
            <x-article-tag-filter/>
        </aside>
    </div>
    {{ $articles->links() }}
</x-app-layout>
