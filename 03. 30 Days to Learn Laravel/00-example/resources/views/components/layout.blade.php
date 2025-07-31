<!doctype html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>{{ $title }} | Example</title>
</head>

<body class="h-full">
<div class="min-h-full">

    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company" class="size-8"/>
                    </div>
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-item href="/" :active="request()->is('/')">Home</x-nav-item>
                        <x-nav-item href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-item>
                        <x-nav-item href="/contact" :active="request()->is('contact')">Contact</x-nav-item>
                    </div>
                </div>

                @guest
                    <div class="flex gap-2">
                        <x-nav-item href="/auth/register" :active="request()->is('auth/register')">Register</x-nav-item>
                        <x-nav-item href="/auth/login" :active="request()->is('auth/login')">Log In</x-nav-item>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            <x-a-button href="/jobs/create">Create Job</x-a-button>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

</div>
</body>
</html>
