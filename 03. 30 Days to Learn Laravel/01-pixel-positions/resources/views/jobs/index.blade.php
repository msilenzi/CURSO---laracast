<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>
            <form action="" class="mt-6">
                <input
                    type="text"
                    placeholder="I'm looking for..."
                    class="rounded-xl bg-white/5 border border-white/10 px-5 py-4 w-full max-w-2xl placeholder:text-neutral-500"
                />

            </form>
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
                    <li><x-tag>{{$tag->name}}</x-tag></li>
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
