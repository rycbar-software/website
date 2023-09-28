@props(['name', 'title', 'value', 'checked'])
<div class="flex mb-2">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($checked)
            checked
        @endif
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
    >
    <label
        for="{{ $name }}"
        class="ml-2 text-sm font-medium text-gray-900"
    >{{ $title }}</label>
</div>
