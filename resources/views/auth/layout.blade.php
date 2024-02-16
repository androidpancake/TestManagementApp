<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Management</title>
    @vite(['resources/js/darkmode.js'])
    @vite(['resources/css/datatables.min.css','resources/js/datatables.min.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    @include('layouts.header')
    <div class="flex justify-center items-center h-screen bg-gray-200 dark:bg-gray-900">
        @yield('content')
    </div>
</body>

</html>