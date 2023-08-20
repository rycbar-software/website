<x-app-layout>
    <x-slot:h1>Articles</x-slot:h1>
    <section class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($products as $product)
            <article class="py-12 flex">
                <img src="{{ $product->getPreview() }}" alt="">
                <div class="space-y-5 xl:col-span-3 w-3/4">
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold leading-8 tracking-tight">
                            <a class="text-gray-900" href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                        </h2>
                        <a href="{{ $product->url }}">Github link</a>
                        <div class="prose max-w-none text-gray-500">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="text-base font-medium leading-6">
                        <a href="{{ route('products.show', $product) }}" class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400">Read more</a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
    {{ $products->links() }}
</x-app-layout>
