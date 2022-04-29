@props(['name', 'label', 'value' => '', 'id' => null, 'min' => null, 'max' => null, 'step' => 'any'])
@php($id = $name)

<div class="mt-6">
    <label for="{{ $name }}" class="text-sm text-gray-600 dark:text-gray-200">{{ $label }}</label>

    <div class="flex mt-2">
        <span
            class="flex justify-center items-center grow-0 rounded-l h-10 select-none w-8 bg-gray-700 hover:bg-gray-600 text-gray-400 font-bold cursor-pointer">–</span>
        <input type="text" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}"
            @if ($min) min="{{ $min }}" @endif
            @if ($min) max="{{ $max }}" @endif step="{{ $step }}"
            class="grow h-10 text-gray-700 text-center placeholder-gray-400 bg-white border-y border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:outline-none" />
        <span
            class="flex justify-center items-center grow-0 rounded-r h-10 select-none w-8 bg-gray-700 hover:bg-gray-600 text-gray-400 font-bold cursor-pointer">+</span>

    </div>
</div>
