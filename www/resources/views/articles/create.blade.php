<x-app-layout>
    <x-slot:h1>Create article</x-slot:h1>
    <x-forms.default-edit-form action="{{ route('articles.store') }}" :entity="null"></x-forms.default-edit-form>
</x-app-layout>
