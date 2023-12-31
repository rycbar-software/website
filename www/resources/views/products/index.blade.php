<x-app-layout>
    <x-slot:h1>Products</x-slot:h1>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @can('create product')
        <x-forms.buttons.add href="{{ route('products.create') }}"></x-forms.buttons.add>
    @endcan
    <section class="">
        @foreach($products as $product)
            <article class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row mb-10">
                <div class="w-3/5">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-full md:w-auto md:rounded-none md:rounded-l-lg" src="{{ $product->getPreviewPicture() }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                </div>

                <div class="w-2/5 flex flex-col justify-between p-4 leading-normal">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a class="hover:text-gray-700 text-gray-900" href="{{ route('products.show', $product) }}">{{ $product->getName() }}</a></h2>
                    @if($product->external_link)
                        <p class="py-3"><a href="{{ $product->external_link }}">{{ $product->external_link }}</a></p>
                    @endif
                    <div class="content text-justify mb-3 font-normal text-gray-700 dark:text-gray-400 max-h-48 overflow-hidden content">{!! $product->getPreviewText() !!}</div>
                </div>
            </article>
        @endforeach
    </section>
    {{ $products->links() }}
</x-app-layout>
