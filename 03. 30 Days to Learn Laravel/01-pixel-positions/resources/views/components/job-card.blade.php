@props(['job'])

<x-panel class="flex-col text-center h-full">
    <div class="self-start text-sm">{{$job->employer->name}}</div>

    <div class="py-8 grow">
        <a href="{{$job->url}}">
            <h3 class="font-bold group-hover:text-blue-600 text-2xl transition-colors duration-200">{{$job->title}}</h3>
        </a>
        <p class="text-sm mt-4">{{$job->employment_type}} - From {{$job->salary}}</p>
    </div>

    <div class="flex justify-between items-center gap-4">
        <ul class="flex gap-2 flex-wrap">
            @foreach($job->tags as $tag)
                <li>
                    <a href="/tags/{{$tag->name}}">
                        <x-tag size="small">{{$tag->name}}</x-tag>
                    </a>
                </li>
            @endforeach
        </ul>

        <img src="https://placehold.co/42" alt="" class="rounded">
    </div>
</x-panel>
