<x-app-layout>
    <x-slot:h1>Edit article "{{ $article->name }}"</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName(), $article) }}</x-slot:breadcrumbs>
    <x-forms.default-edit-form action="{{ route('articles.update', [$article]) }}" :entity="$article">
        @method('PUT')
    </x-forms.default-edit-form>
</x-app-layout>
