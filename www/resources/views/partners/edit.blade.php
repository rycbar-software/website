<x-app-layout>
    <x-slot:h1>Edit partner "{{ $partner->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $partner) }}</x-slot:breadcrumbs>
    <x-forms.default-edit-form action="{{ route('partners.update', [$partner]) }}" :entity="$partner">
        @method('PUT')
        <span>Preview Picture</span>
        <img src="{{ $partner->getPreviewPicture() }}" alt="">
        <x-forms.input-group>
            <input type="file" name="preview_picture" accept="image/*">
        </x-forms.input-group>
        <span>Detail Picture</span>
        <img src="{{ $partner->getDetailPicture() }}" alt="">
        <x-forms.input-group>
            <input type="file" name="detail_picture" accept="image/*">
        </x-forms.input-group>
    </x-forms.default-edit-form>
</x-app-layout>
