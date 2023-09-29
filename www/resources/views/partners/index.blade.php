<x-app-layout>
    <x-slot:h1>Partners</x-slot:h1>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @can('create partner')
        <x-forms.buttons.add href="{{ route('partners.create') }}"></x-forms.buttons.add>
    @endcan
    <section>
        @foreach($partners as $partner)
            <div
                class="mb-3 overflow-hidden flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] md:flex-row w-full">
                @if($loop->odd)
                    <x-partners.index.picture :partner="$partner"></x-partners.index.picture>
                @endif
                <x-partners.index.description :partner="$partner"></x-partners.index.description>
                @if($loop->even)
                    <x-partners.index.picture :partner="$partner"></x-partners.index.picture>
                @endif
            </div>
        @endforeach
    </section>
</x-app-layout>
