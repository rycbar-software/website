<x-app-layout>
    <x-slot:h1>Articles</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName()) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @can('create article')
        <x-forms.buttons.add href="{{ route('articles.create') }}"></x-forms.buttons.add>
    @endcan
    <section itemscope itemtype="https://schema.org/ItemList">
        @foreach($articles as $article)
            <article class="article" itemprop="itemListElement" itemscope itemtype="https://schema.org/Article">
                <div class="article__info">
                    <p class="article__Status">{{ $article->isPublished() ? 'Published' : 'Draft' }}</p>
                    <time datetime="{{ $article->created_at->toIso8601String() }}" class="article__date">{{ $article->publishDate() }}</time>
                    <meta itemprop="datePublished" content="{{ $article->created_at->toIso8601String() }}">
                    <p class="article__author"><span>By </span><a href="https://a-kryvenko.com/" itemprop="author">Andriy Kryvenko</a></p>
                </div>
                <div class="article__content">
                    <a href="{{ route('articles.show', $article) }}"><h2 class="article__name" itemprop="name">{{ $article->getName() }}</h2></a>
                    <div class="article__text" itemprop="articleBody">{!! $article->preview_text !!}</div>
                    <div class="article__details">
                        <a href="{{ route('articles.show', $article) }}" class="link link--blue">Read more</a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
    {{ $articles->links() }}
</x-app-layout>
