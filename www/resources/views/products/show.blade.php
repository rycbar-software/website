<x-app-layout>
    <x-slot:h1>{{ $product->getName() }}</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $product) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo()->for($product) !!}</x-slot:seo>
    @can('edit article')
        <div class="flex">
            <x-forms.buttons.edit href="{{ route('products.edit', [$product]) }}"></x-forms.buttons.edit>
            <x-forms.buttons.delete action="{{ route('products.destroy', [$product]) }}"></x-forms.buttons.delete>
        </div>
    @endcan
    <article>
        <div class="content">{!! $product->getDetailText() !!}</div>
    </article>
</x-app-layout>
