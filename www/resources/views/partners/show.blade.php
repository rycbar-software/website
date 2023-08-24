<x-app-layout>
    <x-slot:h1>{{ $partner->name }}</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $partner) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo()->for($partner) !!}</x-slot:seo>
    @can('edit article')
        <x-forms.buttons.edit href="{{ route('partners.edit', [$partner]) }}"></x-forms.buttons.edit>
    @endcan
    <article>
        <div>{!! $partner->getDetailText() !!}</div>
    </article>
</x-app-layout>
