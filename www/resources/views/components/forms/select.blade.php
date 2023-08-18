@props(['name', 'title'])
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $title }}</label>
<select id="{{ $name }}" name="{{ $name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    {{ $slot }}
</select>
