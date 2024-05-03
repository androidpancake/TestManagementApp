<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Management</title>
    @vite(['resources/js/darkmode.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('css/phosporIcons/style.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('js/ckeditor/contents.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('js/ckeditor/skins/bootstrap/editor.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('js/ckeditor/skins/moono-lisa/editor_gecko.css') }}"> -->
    <script src="{{ asset('js/apexCharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/quill/quill.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/sweetalert2/sweetalert2.js') }}"></script>

    <!-- <script src="{{ asset('js/ckeditor/styles.js') }}"></script> -->
    <!-- <script src="{{ asset('js/ckeditor/config.js') }}"></script> -->
    <!-- <script src="{{ asset('js/ckeditor/lang/en.js') }}"></script> -->

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    @include('layouts.header')
    <livewire:sidebar.sidebar />
    <div class="p-4 pt-16 sm:ml-64 min-h-screen bg-gray-200 dark:bg-gray-900">
        {{ $slot }}
    </div>
    @livewireScripts
    @stack('wysiwyg')
</body>

</html>