<x-app-layout>
    <x-slot:h1>Contacts</x-slot:h1>
    <x-slot:seo>{!! seo($SEOData) !!}</x-slot:seo>
    <div>
        @include('feedback.form')
    </div>
</x-app-layout>
