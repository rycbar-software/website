<x-app-layout>
    <x-slot:h1>Create article</x-slot:h1>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <x-forms.input-group>
            <x-forms.select name="status" title="Select article status">
                @foreach(\App\Enum\ArticleStatusEnum::cases() as $status)
                    <option value="{{ $status->value }}">{{ $status->name }}</option>
                @endforeach
            </x-forms.select>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="title" title="Title:" value="" placeholder="Article browser title"></x-forms.input-text>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="name" title="Name:" value="" placeholder="Article name"></x-forms.input-text>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="slug" title="Slug:" value="" placeholder="Article slug"></x-forms.input-text>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.tinymce-editor name="preview_text" :value="'test'" title="Article preview text"></x-forms.tinymce-editor>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.tinymce-editor name="detail_text" :value="'test'" title="Article detail text"></x-forms.tinymce-editor>
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.buttons.submit value="Save"></x-forms.buttons.submit>
        </x-forms.input-group>
    </form>
</x-app-layout>
