<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:heading>Jobs List</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <li class="mb-2">
                <a href="/jobs/{{$job->getId()}}" class="hover:underline">
                    <strong>{{$job->getTitle()}}:</strong> {{$job->getSalary()}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
