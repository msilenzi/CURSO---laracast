<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:heading>Job</x-slot:heading>

    @if(isset($job))
        <p>{{$job->title}} - {{$job->salary}}</p>
        @can('update', $job)
            <x-a-button href="/jobs/{{$job->id}}/edit" class="mt-3">Edit</x-a-button>
        @endcan
    @else
        <p>Job not found</p>
        <a href="/jobs" class="inline-block mt-3 text-blue-500 hover:underline">Back to jobs</a>
    @endif
</x-layout>
