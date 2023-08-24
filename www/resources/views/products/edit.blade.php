<x-app-layout>
    <x-slot:h1>Edit product "{{ $product->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $product) }}</x-slot:breadcrumbs>

    <x-forms.default-edit-form action="{{ route('products.update', [$product]) }}" :entity="$product">
        @method('PUT')
        <x-forms.input-group>
            <x-forms.input-text name="external_link" title="External link:" :value="$product->external_link" placeholder="External link"></x-forms.input-text>
        </x-forms.input-group>
    </x-forms.default-edit-form>
</x-app-layout>
