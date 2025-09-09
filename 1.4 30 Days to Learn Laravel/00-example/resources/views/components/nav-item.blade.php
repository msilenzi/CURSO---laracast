@props([
    'active' => false,
    'type' => 'desktop'
])


@switch($type)
    @case('desktop')
        <a
            {{$attributes}}
            class="{{$active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 font-medium text-sm"
            aria-current="{{$active ? 'page' : 'false'}}"
        >
            {{$slot}}
        </a>
        @break
    @case('mobile')
        <a
            {{$attributes}}
            class="{{$active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 font-medium block text-base"
            aria-current="{{$active ? 'page' : 'false'}}"
        >
            {{$slot}}
        </a>
        @break
    @default
        @php throw new \InvalidArgumentException("Invalid type") @endphp
@endswitch
