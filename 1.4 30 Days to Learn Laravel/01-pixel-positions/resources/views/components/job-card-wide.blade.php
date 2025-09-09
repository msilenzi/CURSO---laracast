@props(['job'])

@php
    $imageSrc = str_starts_with($job->employer->logo, 'https://')
                    ? $job->employer->logo
                    : Illuminate\Support\Facades\Storage::url($job->employer->logo);
@endphp

<x-panel class="gap-4">
    <img src="{{ $imageSrc }}" alt="Logo of {{$job->employer->name}}" width="80" height="80" class="rounded-lg w-[5rem] h-[5rem]">

    <div class="grow flex flex-col">
        <header class="flex justify-between items-center">
            <a href="#" class="text-sm text-neutral-500">{{$job->employer->name}}</a>
            <ul class="flex gap-2">
                <li><x-tag size="small" variant="outline">{{$job->location}}</x-tag></li>
            </ul>
        </header>

        <div class="grow flex items-center">
            <a href="{{$job->url}}" target="_blank" rel="noopener noreferrer">
                <h3 class="font-bold text-xl group-hover:text-blue-600 transition-colors duration-200">{{$job->title}}</h3>
            </a>
        </div>

        <footer class="flex justify-between items-center gap-4">
            <p class="text-neutral-500">{{$job->employment_type}} - From {{$job->salary}}</p>
            <ul class="flex gap-2 flex-wrap">
                @foreach($job->tags as $tag)
                    <li>
                        <a href="/tags/{{$tag->name}}">
                            <x-tag size="small">{{$tag->name}}</x-tag>
                        </a>
                    </li>
                @endforeach
            </ul>
        </footer>
    </div>
</x-panel>
