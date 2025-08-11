<x-layout>
    <div class="space-y-10">
        <section>
            <x-section-heading>Featured Jobs</x-section-heading>

            <ul class="grid lg:grid-cols-3 gap-8 mt-6">
                <li><x-job-card /></li>
                <li><x-job-card /></li>
                <li><x-job-card /></li>
            </ul>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <ul class="flex gap-2 mt-6">
                <li><x-tag></x-tag></li>
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

        </section>
    </div>
</x-layout>
