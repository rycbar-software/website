<x-app-layout>
    <x-slot:h1>Partners</x-slot:h1>
    <section class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($partners as $partner)
            <article class="py-12 flex">
                <img src="{{ $partner->getPreview() }}" alt="">
                <div class="space-y-5 xl:col-span-3 w-3/4">
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold leading-8 tracking-tight">
                            <a class="text-gray-900" href="{{ route('partners.show', $partner) }}">{{ $partner->name }}</a>
                        </h2>
                        <div class="prose max-w-none text-gray-500">
                            {!! $partner->description !!}
                        </div>
                    </div>
                    <div class="text-base font-medium leading-6">
                        <a href="{{ route('partners.show', $partner) }}" class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400">Read more</a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
</x-app-layout>
