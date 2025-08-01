<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:heading>Jobs List</x-slot:heading>

    <div class="grid grid-cols-[repeat(auto-fill,minmax(400px,1fr))] gap-4">
        @foreach($jobs as $job)
            <a href="/jobs/{{$job->id}}" class="block px-4 py-6 bg-gray-50 rounded-md shadow-md border border-gray-100 hover:shadow-xl hover:text-underline hover:z-10 hover:scale-102 transition-all duration-400 ease-out">
                <span class="text-neutral-500 uppercase text-xs">{{$job->employer->name}}</span>
                <h2 class="font-bold text-2xl block">{{$job->title}}</h2>
                <p class="font-semibold text-indigo-500 text-2xl">{{$job->salary}}</p>
            </a>
        @endforeach
    </div>

    <div class="my-10">
        {{$jobs->links()}}
    </div>
</x-layout>
