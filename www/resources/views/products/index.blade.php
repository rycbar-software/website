<x-app-layout>
    <x-slot:h1>Products</x-slot:h1>
    @can('create product')
        <x-forms.buttons.add href="{{ route('products.create') }}"></x-forms.buttons.add>
    @endcan
    <section class="">
        @foreach($products as $product)
            <article class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row mb-10">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-full md:w-auto md:rounded-none md:rounded-l-lg" src="{{ $product->getPreviewPicture() }}" title="{{ $product->name }}" alt="{{ $product->name }}">

                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a class="hover:text-gray-700 text-gray-900" href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h2>
                    @if($product->external_link)
                        <p><a href="{{ $product->external_link }}">Open on GitHub</a></p>
                    @endif
                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 max-h-48 overflow-hidden">{!! $product->getPreviewText() !!}</div>
                </div>
            </article>
        @endforeach
    </section>
    {{ $products->links() }}
</x-app-layout>
