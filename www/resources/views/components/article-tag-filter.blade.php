<div class="tag-filter">
    <p class="tag-filter__title">Tags</p>
    <div class="tag-filter__list">
        @foreach($tags as $tag)
            <a
                href="{{ $tag['url'] }}"
                class="tag-filter__tag tag {{ $tag['checked'] ? 'tag--checked' : '' }}"
            >{{ $tag['name'] }}</a>
        @endforeach
    </div>
</div>
