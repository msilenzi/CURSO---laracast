<x-layout>
    <x-page-heading>Post a new job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input
            label="Title"
            name="title"
            placeholder="{{fake()->jobTitle()}}"
        />

        <x-forms.input
            label="Salary"
            name="salary"
            placeholder="USD {{fake()->numberBetween(20, 100) * 1000}}"
        />

        <x-forms.input
            label="Location"
            name="location"
            placeholder="{{fake()->city()}}"
        />

        <x-forms.input
            label="URL"
            name="url"
            placeholder="{{fake()->url()}}"
        />

        <x-forms.select label="Employment type" name="employment_type">
            <option>Full Time</option>
            <option>Part Time</option>
            <option>Contract</option>
            <option>Internship</option>
            <option>Temporary</option>
        </x-forms.select>

        <x-forms.input
            label="Tags (comma separated)"
            name="tags"
            placeholder="{{fake()->word()}}, {{fake()->word()}}, {{fake()->word()}}"
        />

        <x-forms.checkbox label="Featured (extra cost)" name="featured" />

        <x-forms.button class="block ml-auto mt-10">Publish</x-forms.button>
    </x-forms.form>
</x-layout>
