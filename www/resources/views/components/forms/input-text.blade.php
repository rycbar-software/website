@props(['name', 'title', 'value', 'placeholder'])
<div class="flex">
    <label
        for="{{ $name }}"
        @error($name)
            class="block w-1/3 text-sm font-medium text-red-700"
        @else
            class="block w-1/3 text-sm font-medium text-gray-900 mr-3"
        @enderror
    >{{ $title }}</label>
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value ?: '') }}"
        placeholder="{{ $placeholder ?: ($title ?: '') }}"
        @error($name)
            class="block w-2/2 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
        @else
            class="block w-2/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        @enderror
    >
</div>
@error($name)
<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first($name) }}</p>
@enderror
