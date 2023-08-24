<x-app-layout>
    <x-slot:h1>Edit partner "{{ $partner->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $partner) }}</x-slot:breadcrumbs>
    <x-forms.default-edit-form action="{{ route('partners.update', [$partner]) }}" :entity="$partner">
        @method('PUT')
    </x-forms.default-edit-form>
</x-app-layout>
