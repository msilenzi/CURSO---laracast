<x-layout>
    <section>
        <x-page-heading>Results for "{{$search}}"</x-page-heading>
        <ul class="mt-6 space-y-6">
            @foreach($jobs as $job)
                <li><x-job-card-wide :$job /></li>
            @endforeach
        </ul>
    </section>
</x-layout>
