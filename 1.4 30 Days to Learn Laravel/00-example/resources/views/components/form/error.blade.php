@props(['for'])

@error($for)
    {{-- $message exists only inside @error() --}}
    <small {{$attributes->merge(['class' => 'text-red-500'])}}>{{$message}}</small>
@enderror
