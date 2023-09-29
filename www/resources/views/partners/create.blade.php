<x-app-layout>
    <x-slot:h1>Create partner</x-slot:h1>
    <x-forms.default-edit-form action="{{ route('partners.store') }}" :entity="null">
        <x-forms.input-group>
            <input type="file" name="preview_picture" accept="image/*">
        </x-forms.input-group>
        <x-forms.input-group>
            <input type="file" name="detail_picture" accept="image/*">
        </x-forms.input-group>
    </x-forms.default-edit-form>
</x-app-layout>
