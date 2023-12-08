<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Test Management</title>
   <script src="https://unpkg.com/@phosphor-icons/web"></script>
   @vite('resources/js/darkmode.js')
   @vite(['resources/css/datatables.min.css','resources/js/datatables.min.js'])
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   <script src="flowbite/dist/datepicker.js"></script>

   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> -->
   @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
   @include('layouts.header')
   @include('layouts.sidebar')
   <div class="p-4 pt-16 sm:ml-64 bg-gray-200 dark:bg-gray-900">
      @yield('content')
   </div>
   @stack('test-chart')
   @stack('add-form')

</body>

</html>