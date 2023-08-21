<x-app-layout>
    <x-slot:h1>Edit article "{{ $article->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $article) }}</x-slot:breadcrumbs>
    <form action="{{ route('articles.update', [$article]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $article->id }}">
        <x-forms.input-group>
            <x-forms.select name="status" title="Select article status">
                @foreach(\App\Enum\ArticleStatusEnum::cases() as $status)
                    <option
                        value="{{ $status->value }}"
                        @if($article->status == $status)
                            selected
                        @endif
                    >{{ $status->name }}</option>
                @endforeach
            </x-forms.select>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="title" title="Title:" :value="$article->title" placeholder="Article browser title"></x-forms.input-text>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="name" title="Name:" :value="$article->name" placeholder="Article name"></x-forms.input-text>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="slug" title="Slug:" :value="$article->slug" placeholder="Article slug"></x-forms.input-text>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.tinymce-editor name="preview_text" :value="$article->preview_text" title="Article preview text"></x-forms.tinymce-editor>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.tinymce-editor name="detail_text" :value="$article->detail_text" title="Article detail text"></x-forms.tinymce-editor>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.buttons.submit value="Save"></x-forms.buttons.submit>
        </x-forms.input-group>
    </form>
</x-app-layout>
