@props([
    'size' => 'base',
    'variant' => 'normal'
])

@php
    $classes = "rounded transition-colors duration-200 border";

    if ($size === 'small') {
        $classes .= " px-2 py-0.5 text-xs font-light tracking-wide";
    } else {
        $classes .= " px-5 py-1 text-sm";
    }

    if ($variant === 'outline') {
        $classes .= " border-white/10 hover:border-white/20";
    } else {
        $classes .= " bg-white/10 hover:bg-white/20 border-white/0";
    }
@endphp

<a href="#tag" class="{{$classes}}">Frontend</a>
