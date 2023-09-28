<div class="tag-list">
    @foreach($tags as $tag)
        <span class="tag-list__tag tag {{ $tag['checked'] ? 'tag--checked' : '' }}"
        >{{ $tag['name'] }}</span>
    @endforeach
</div>
