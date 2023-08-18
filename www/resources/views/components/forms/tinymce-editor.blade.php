@props(['name', 'title', 'value'])
<label for="{{ $name }}" class="block text-sm font-medium text-gray-900 mb-2">{{ $title }}</label>
<textarea class="tynimce-editor" name="{{ $name }}" id="{{ $name }}">{!! old($name, $value) !!}</textarea>
