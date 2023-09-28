<x-app-layout>
    <x-slot:h1>Partners</x-slot:h1>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    @can('create partner')
        <x-forms.buttons.add href="{{ route('partners.create') }}"></x-forms.buttons.add>
    @endcan
    <section class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($partners as $partner)
            <article class="py-12 flex">
{{--                <img src="{{ $partner->getPreviewPicture() }}" alt="">--}}
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold leading-8 tracking-tight">
                        <a class="text-gray-900" href="{{ route('partners.show', $partner) }}">{{ $partner->getName() }}</a>
                    </h2>
                    <div class="content prose max-w-none text-gray-500">
                        {!! $partner->getPreviewText() !!}
                    </div>
                </div>
            </article>
        @endforeach
    </section>
</x-app-layout>
