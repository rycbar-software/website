<a href="{{ route('partners.show', [$partner]) }}" class="w-1/2 block">
    <img
        class="w-100 rounded-t-lg object-cover md:h-auto md:!rounded-none md:!rounded-l-lg"
        src="{{ $partner->getPreviewPicture() }}"
        alt="" />
</a>
