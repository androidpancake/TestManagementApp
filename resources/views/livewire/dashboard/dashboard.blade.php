<div class="pt-4 h-screen space-y-2">
    <!-- title -->
    <livewire:head title="Dashboard" description="Selamat Datang" user_name="{{ auth()->user()->name }}" />
    <!-- section1 -->
    <div class="flex flex-col gap-2 lg:flex-row">
        <!-- Chart section -->
        <div class="w-full lg:w-full bg-white rounded-lg dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between mb-3">
                <div class="flex justify-center items-center">
                    <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white pe-1">Test Type Summary</h5>
                </div>
            </div>

            <!-- Chart -->
            <div class="py-6" id="donut-chart"></div>
        </div>
        @if(auth()->user()->roles->first()->name === 'USER')
        <!-- Project section -->
        <div class="w-full lg:w-3/5 bg-white rounded-lg dark:bg-gray-800 p-4">

            <!-- project -->
            <div class="relative overflow-x-auto">
                <livewire:project.project />
            </div>
        </div>
        @endif
    </div>

    @if(auth()->user()->roles === 'ADMIN')
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
            <livewire:user-list lazy />
        </div>
    </div>
    @endif
</div>
<script>
    // ApexCharts options and config
    var chartData = <?php echo json_encode($chartData) ?>;
    window.addEventListener("load", function() {
        const getChartOptions = () => {
            return {
                series: chartData.series,
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
                                    show: true,
                                    label: "Total Test",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return `${sum}`
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
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: chartData.labels,
                dataLabels: {
                    enabled: false,
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