<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:heading>Edit Job</x-slot:heading>

    <form method="POST" action="/jobs/{{$job->id}}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Editing {{$job->title}}</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="title" type="text" name="title" placeholder="Shift Leader" value="{{ old('title') ?? $job->title }}" required class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                            </div>
                            @error('title')
                                {{-- $message exists only inside @error() --}}
                                <small class="text-red-500">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="salary" type="text" name="salary" placeholder="USD 50.000" value="{{ old('salary') ?? $job->salary }}" required class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                            </div>
                            @error('salary')
                                <small class="text-red-500">{{$message}}</small>
                            @enderror
                        </div>
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
            <button form="delete" type="submit" class="text-sm/6 font-semibold text-red-500 hover:text-red-400 cursor-pointer">Delete</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 cursor-pointer focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>

    <form id="delete" method="POST" action="/jobs/{{$job->id}}" class="hidden">
        @csrf()
        @method('DELETE')
    </form>
</x-layout>
