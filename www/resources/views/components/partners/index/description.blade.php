<div class="w-1/2 flex flex-col justify-start p-4">
    <a href="{{ route('partners.show', [$partner]) }}"><h5
            class="mb-2 text-xl font-medium text-neutral-800">
            {{ $partner->getName() }}
        </h5></a>
    <p class="mb-4 text-base text-neutral-600">
        {!! $partner->preview_text !!}
    </p>
</div>
