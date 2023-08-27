<x-app-layout>
    <x-slot:h1>{{ $partner->getName() }}</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $partner) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo()->for($partner) !!}</x-slot:seo>
    @can('edit article')
        <div class="flex">
            <x-forms.buttons.edit href="{{ route('partners.edit', [$partner]) }}"></x-forms.buttons.edit>
            <x-forms.buttons.delete action="{{ route('partners.destroy', [$partner]) }}"></x-forms.buttons.delete>
        </div>
    @endcan
    <article>
        <div>{!! $partner->getDetailText() !!}</div>
    </article>
</x-app-layout>
