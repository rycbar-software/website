<x-app-layout>
    <x-slot:h1>Contacts</x-slot:h1>
    <x-slot:breadcrumbs>{{ Breadcrumbs::render(request()->route()->getName()) }}</x-slot:breadcrumbs>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    <div>
        @include('feedback.form')
    </div>
</x-app-layout>
