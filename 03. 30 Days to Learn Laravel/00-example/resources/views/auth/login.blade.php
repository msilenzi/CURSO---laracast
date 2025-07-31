<x-layout>
    <x-slot:title>Log In</x-slot:title>
    <x-slot:heading>Log In</x-slot:heading>

    <form method="POST" action="/auth/login" class="max-w-lg mx-auto my-0 bg-white rounded-lg p-8 shadow-md mt-10">
        @csrf
        <div class="grid gap-x-3 gap-y-5 grid-cols-6">
            <div class="col-span-6">
                <x-form.group-text
                    name="email"
                    type="text"
                    placeholder="jdoe@example.com"
                    :value="old('email')"
                    required
                    autocomplete="email"
                    label="Email"
                />
            </div>

            <div class="col-span-6">
                <x-form.group-text
                    name="password"
                    type="password"
                    placeholder=""
                    required
                    autocomplete="new-password"
                    label="Password"
                />
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

        <div class="mt-10 flex items-center justify-between gap-x-6 text-sm">
            <p>Don't have an account? <a href="/auth/register" class="text-indigo-500 hover:text-indigo-400 hover:underline">Register</a></p>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log In</button>
        </div>
    </form>
</x-layout>
