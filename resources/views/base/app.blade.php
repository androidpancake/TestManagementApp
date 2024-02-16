<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Management</title>
    @vite(['resources/js/darkmode.js'])
    @vite(['resources/css/datatables.min.','resources/js/datatables.min.js'])
    css
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    @include('layouts.header')
    <livewire:sidebar.sidebar />
    <div class="p-4 pt-16 sm:ml-64 bg-gray-200 dark:bg-gray-900">
        @yield('content')
    </div>
    @stack('test-chart')
    @stack('add-form')

</body>

</html>