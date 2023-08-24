<x-app-layout>
    <x-slot:h1>Create partner</x-slot:h1>
    <x-forms.default-edit-form action="{{ route('partners.store') }}" :entity="null"></x-forms.default-edit-form>
</x-app-layout>
