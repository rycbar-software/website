<x-app-layout>
    <x-slot:h1>{{ $product->getName() }}</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $product) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo()->for($product) !!}</x-slot:seo>
    @can('edit article')
        <x-forms.buttons.edit href="{{ route('products.edit', [$product]) }}"></x-forms.buttons.edit>
    @endcan
    <article>
        <div>{!! $product->getDetailText() !!}</div>
    </article>
</x-app-layout>
