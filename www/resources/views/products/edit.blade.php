<x-app-layout>
    <x-slot:h1>Edit product "{{ $product->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $product) }}</x-slot:breadcrumbs>

    <x-forms.default-edit-form action="{{ route('products.update', [$product]) }}" :entity="$product">
        @method('PUT')
        <span>Preview Picture</span>
        <img src="{{ $product->getPreviewPicture() }}" alt="">
        <x-forms.input-group>
            <input type="file" name="preview_picture" accept="image/*">
        </x-forms.input-group>
        <span>Detail Picture</span>
        <img src="{{ $product->getDetailPicture() }}" alt="">
        <x-forms.input-group>
            <input type="file" name="detail_picture" accept="image/*">
        </x-forms.input-group>
        <x-forms.input-group>
            <x-forms.input-text name="external_link" title="External link:" :value="$product->external_link" placeholder="External link"></x-forms.input-text>
        </x-forms.input-group>
    </x-forms.default-edit-form>
</x-app-layout>
