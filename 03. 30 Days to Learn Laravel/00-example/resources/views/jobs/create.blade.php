<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form.group-text
                            name="title"
                            type="text"
                            placeholder="Shift Leader"
                            value="{{ old('title') }}"
                            required
                            label="Title"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.group-text
                            name="salary"
                            type="text"
                            placeholder="USD 50.000"
                            value="{{ old('salary') }}"
                            required
                            label="Salary"
                        />
                    </div>
                </div>

                {{--
                @if($errors->any())
                    <ul class="mt-3">
                        @foreach($errors->all() as $err)
                            <li class="text-red-500">{{$err}}</li>
                        @endforeach
                    </ul>
                @endif
                --}}

            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>
