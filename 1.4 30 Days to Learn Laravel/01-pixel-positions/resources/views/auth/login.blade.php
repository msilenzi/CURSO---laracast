<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <div class="flex items-center content-between mt-10">
            <p class="text-neutral-400">Don't have an account? <a href="/register" class="text-blue-500 underline hover:text-blue-400">Sign up</a></p>
            <x-forms.button class="block ml-auto">Login</x-forms.button>
        </div>
    </x-forms.form>
</x-layout>
