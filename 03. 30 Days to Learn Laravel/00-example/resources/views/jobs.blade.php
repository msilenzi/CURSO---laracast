<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:heading>Jobs List</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <li class="mb-2">
                <a href="/jobs/{{$job->id}}" class="hover:underline">
                    <strong>{{$job->title}}:</strong> {{$job->salary}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
