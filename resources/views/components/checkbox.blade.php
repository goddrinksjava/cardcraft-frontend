@props(['name', 'label', 'checked' => false, 'id', 'value'])
@php($id = $name)

<input type="checkbox" name="{{ $name }}" id="{{ $id }}" class="mr-1"
    @if ($checked == '1') checked @endif value="{{ $value }}">
<label for="{{ $id }}" class="text-sm text-gray-600 dark:text-gray-200">
    {{ $label }}
</label>
