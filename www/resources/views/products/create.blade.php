<x-app-layout>
    <x-slot:h1>Create product</x-slot:h1>
    <x-forms.default-edit-form action="{{ route('articles.store') }}" :entity="null">
        <x-forms.input-group>
            <x-forms.input-text name="external_link" title="External link:" value="" placeholder="External link"></x-forms.input-text>
        </x-forms.input-group>
    </x-forms.default-edit-form>
</x-app-layout>
