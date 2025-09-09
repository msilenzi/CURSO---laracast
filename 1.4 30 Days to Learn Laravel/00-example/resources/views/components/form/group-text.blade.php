@props([
    'name',
    'label',
    'labelClass' => '',
    'inputClass' => '',
    'errorClass' => '',
])

<x-form.label for="{{ $name }}" class="{{ $labelClass }}">
    {{ $label }}
</x-form.label>

<div class="mt-1">
    <x-form.input
        id="{{ $name }}"
        name="{{ $name }}"
        class="{{ $inputClass }}"
        {{ $attributes->except(['id', 'name', 'class', 'label', 'labelClass', 'inputClass', 'errorClass']) }}
    />
    <x-form.error for="{{ $name }}" class="{{ $errorClass }}" />
</div>
