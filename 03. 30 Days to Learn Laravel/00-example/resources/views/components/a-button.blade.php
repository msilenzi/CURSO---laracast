<a
    {{$attributes->merge([
        'class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md cursor-pointer hover:text-gray-700 hover:border-gray-500'
    ])}}
>
    {{$slot}}
</a>
