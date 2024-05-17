<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Management</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/phosporIcons/style.css') }}" />
    <script src="{{ asset('js/apexCharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/quill/quill.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/sweetalert2/sweetalert2.js') }}"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @include('layouts.header')
    @auth
    <livewire:sidebar.sidebar />
    <div class="p-4 pt-16 sm:ml-64 h-screen overflow-auto bg-gray-200 dark:bg-gray-900">
        {{ $slot }}
    </div>
    @else
    <div class="flex justify-center items-center h-screen bg-gray-200 dark:bg-gray-900">
        @yield('auth')
    </div>
    @endauth

    @stack('wysiwyg')
    @stack('darkmode')
    @livewireScriptConfig
</body>

</html>