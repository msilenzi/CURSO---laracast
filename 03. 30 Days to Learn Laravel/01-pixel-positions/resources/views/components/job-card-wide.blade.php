@props(['job'])

<x-panel class="gap-4">
    <img src="https://placehold.co/90" alt="" class="rounded-lg">

    <div class="grow flex flex-col">
        <header class="flex justify-between items-center">
            <a href="#" class="text-sm text-neutral-500">{{$job->employer->name}}</a>
            <ul class="flex gap-2">
                <li><x-tag size="small" variant="outline">{{$job->location}}</x-tag></li>
            </ul>
        </header>

        <div class="grow flex items-center">
            <h2 class="font-bold text-xl group-hover:text-blue-600 transition-colors duration-200">{{$job->title}}</h2>
        </div>


        <footer class="flex justify-between items-center">
            <p class="text-neutral-500">{{$job->employment_type}} - From {{$job->salary}}</p>
            <ul class="flex gap-2">
                @foreach($job->tags as $tag)
                    <li><x-tag size="small">{{$tag->name}}</x-tag></li>
                @endforeach
            </ul>
        </footer>
    </div>
</x-panel>
