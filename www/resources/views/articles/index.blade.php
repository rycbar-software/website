<x-app-layout>
    <x-slot:h1>Articles</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName()) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @can('create article')
        <x-forms.buttons.add href="{{ route('articles.create') }}"></x-forms.buttons.add>
    @endcan
    <section class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($articles as $article)
            <article class="py-12 flex">
                <div class="space-y-2 w-1/4">
                    <dl>
                        <dt>{{ $article->isPublished() ? 'Published' : 'Draft' }}</dt>
                        <dd class="text-base font-medium leading-6 text-gray-500">
                            <time datetime="2023-08-05T00:00:00.000Z">{{ $article->publishDate() }}</time>
                        </dd>
                    </dl>
                </div>
                <div class="space-y-5 xl:col-span-3 w-3/4">
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold leading-8 tracking-tight">
                            <a class="text-gray-900" href="{{ route('articles.show', $article) }}">{{ $article->getName() }}</a>
                        </h2>
                        <div class="prose max-w-none text-gray-500 content">
                            {!! $article->preview_text !!}
                        </div>
                    </div>
                    <div class="text-base font-medium leading-6">
                        <a href="{{ route('articles.show', $article) }}" class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400">Read more</a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
    {{ $articles->links() }}
</x-app-layout>
