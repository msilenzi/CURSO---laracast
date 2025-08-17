<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            <x-forms.form method="GET" action="/search" class="mt-8">
                <x-forms.input name="q" :label="false" placeholder="I'm looking for..." />
            </x-forms.form>
        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            <ul class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($jobs->filter(fn($j) => $j->featured) as $job)
                    <!-- :$job === :job="$job" -->
                    <li><x-job-card :$job /></li>
                @endforeach
            </ul>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <ul class="flex gap-2 gap-y-3 mt-6 flex-wrap">
                @foreach($tags as $tag)
                    <li>
                        <a href="/tags/{{$tag->name}}">
                            <x-tag>{{$tag->name}}</x-tag>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <ul class="mt-6 space-y-6">
                @foreach($jobs as $job)
                    <li><x-job-card-wide :$job /></li>
                @endforeach
            </ul>
        </section>
    </div>
</x-layout>
