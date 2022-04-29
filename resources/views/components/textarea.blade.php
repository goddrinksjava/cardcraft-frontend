@props(['name', 'placeholder' => '', 'label', 'value' => '', 'id' => null, 'rows' => '4'])
@php($id = $name)

<div class="mt-6">
    <label for="{{ $id }}" class="text-sm text-gray-600 dark:text-gray-200">{{ $label }}</label>

    <textarea name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">{{ $value }}</textarea>
</div>
