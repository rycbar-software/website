<x-app-layout>
    <x-slot:h1>Edit article "{{ $article->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $article) }}</x-slot:breadcrumbs>
    <x-forms.default-edit-form action="{{ route('articles.update', [$article]) }}" :entity="$article">
        @method('PUT')
        <div class="tags">
            <p>Tags</p>
            <div>
                @foreach(\Spatie\Tags\Tag::all() as $tag)
                    <div class="inline-flex mr-2">
                        <x-forms.input-checkbox
                            :title="$tag->name"
                            :name="'tags['.$tag->name.']'"
                            :value="$tag->name"
                            :checked="$article->tags->contains($tag)"
                        />
                    </div>
                @endforeach
            </div>
            <div>
                <textarea name="new_tags" id="new_tags" cols="60" rows="2">{{ old('new_tags', '') }}</textarea>
            </div>
        </div>
    </x-forms.default-edit-form>
</x-app-layout>
