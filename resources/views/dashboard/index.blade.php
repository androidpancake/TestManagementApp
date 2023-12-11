@extends('base.app')
@section('content')
<div class="pt-4 h-full space-y-2">
    <!-- title -->
    <div class="w-full font-semibold">
        <h1 class="text-xl text-black dark:text-gray-200">Dashboard</h1>
        <p class="text-sm text-gray-600 font-base dark:text-gray-300">Selamat Datang</p>
    </div>
    <!-- section1 -->
    <div class="flex flex-col gap-2 lg:flex-row">
        <!-- chart -->
        <div class="w-full lg:max-w-sm bg-white rounded-lg dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between mb-3">
                <div class="flex justify-center items-center">
                    <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white pe-1">SIT dan UAT Summary</h5>
                </div>
            </div>

            <!-- Chart -->
            <div class="py-6" id="donut-chart"></div>
        </div>
        <!-- table -->
        <div class="lg:w-full bg-white rounded-lg dark:bg-gray-800 p-4">
            <!-- header -->
            <div class="flex justify-between items-center">
                <div class="text-md font-medium text-gray-900 dark:text-white">Project List</div>

                <div>

                    <button id="dropdownFilter" data-dropdown-toggle="dropdown" class="text-black hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-teal-300 font-base rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:text-white dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-blue-800" type="button">Filter
                        <i class="ph ph-faders ms-2"></i>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-28 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownFilter">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kode Project
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Creator
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Creation Date
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                1
                            </th>
                            <td class="px-6 py-4">
                                <div class="bg-gray-100 text-center rounded-lg p-2 text-gray-900">Silver</div>
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td>
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- section2 -->
    <div class="flex flex-col gap-2 lg:flex-row">
        <!-- summary -->
        <div class="w-full lg:max-w-sm bg-white rounded-lg dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between mb-3">
                <div class="flex justify-center items-center">
                    <h5 class="text-md font-medium leading-none text-gray-600 dark:text-white pe-1">User</h5>
                </div>
                <div class="bg-gray-200 text-sm text-gray-500 px-2 py-1 font-semibold">
                    Today
                </div>
            </div>

            <!-- count users data -->
            <div>
                <div class="font-semibold text-5xl text-gray-900">30</div>
            </div>
        </div>
        <!-- table -->
        <div class="lg:w-full bg-white rounded-lg dark:bg-gray-800 p-4">
            <!-- header -->
            <div class="flex justify-between items-center">
                <div class="text-md font-medium text-gray-900 dark:text-white">User List</div>
                <div>
                    <button id="dropdownFilterUser" data-dropdown-toggle="dropdown-2" class="text-black hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-teal-300 font-base rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:text-gray-100 dark:bg-[#019B95] dark:hover:bg-teal-700 dark:focus:ring-blue-800" type="button">Filter
                        <i class="ph ph-faders ms-2"></i>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown-2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-28 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownFilterUser">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Addition Date
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                1
                            </th>
                            <td class="px-6 py-4">
                                <div class="bg-gray-100 text-center text-gray-900 rounded-lg p-2">Silver</div>
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td>
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('test-chart')
<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
        const getChartOptions = () => {
            return {
                series: [35.1, 23.5, 2.4, 5.4],
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: false,
                                    label: "Unique visitors",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return `${sum}k`
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value + "k"
                                    },
                                },
                            },
                            size: "50%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Direct", "Sponsor", "Affiliate", "Email marketing"], //important
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "k"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "k"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
            chart.render();

            // Get all the checkboxes by their class name
            const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

            // Function to handle the checkbox change event
            function handleCheckboxChange(event, chart) {
                const checkbox = event.target;
                if (checkbox.checked) {
                    switch (checkbox.value) {
                        case 'desktop':
                            chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                            break;
                        case 'tablet':
                            chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                            break;
                        case 'mobile':
                            chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                            break;
                        default:
                            chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                    }

                } else {
                    chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                }
            }

            // Attach the event listener to each checkbox
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
            });
        }
    });
</script>
@endpush
@endsection