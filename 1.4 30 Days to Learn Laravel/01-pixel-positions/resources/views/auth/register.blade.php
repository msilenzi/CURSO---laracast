<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name" type="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

        <x-forms.divider />

        <x-forms.input label="Employer Name" name="employer" />
        <x-forms.input label="Employer Logo" name="logo" type="file" />

        <div class="flex items-center content-between mt-10">
            <p class="text-neutral-400">Already have an account? <a href="/login" class="text-blue-500 underline hover:text-blue-400">Log in</a></p>
        <x-forms.button class="block ml-auto">Create account</x-forms.button>
        </div>
    </x-forms.form>

</x-layout>
