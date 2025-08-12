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
                <li><x-job-card /></li>
                <li><x-job-card /></li>
                <li><x-job-card /></li>
            </ul>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <ul class="flex gap-2 gap-y-3 mt-6 flex-wrap">
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
                <li><x-tag></x-tag></li>
            </ul>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <ul class="mt-6 space-y-6">
                <li><x-job-card-wide /></li>
                <li><x-job-card-wide /></li>
                <li><x-job-card-wide /></li>
            </ul>
        </section>
    </div>
</x-layout>
