<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            @if(!empty(session()->get('error')))
                <div class="text-white px-6 py-4 border-0 relative mb-4 bg-red-500">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell" />
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Danger!</b> {{ session()->get('error') }}
                    </span>
                </div>
            @endif
            @if($errors->any())
                <div class="text-white px-6 py-4 border-0 relative mb-4 bg-red-500">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell" />
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Danger!</b>  {{ implode('', $errors->all(':message')) }}
                    </span>
                </div>
            @endif
            @if(!empty(session()->get('success')))
                <div class="alert alert-success">
                    <div class="text-white px-6 py-4 border-0 relative mb-4 bg-green-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell" />
                        </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Success!</b>  {{ session()->get('success') }}
                        </span>
                    </div>
                </div>
            @endif

        <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
