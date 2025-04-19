<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymMinder Dashboard</title>
    @vite("resources/css/app.css")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* @media screen and (min-width: 758px) {
            .dash{
                margin-left: 245px;
            }
        } */
    </style>
</head>
<body class="bg-white">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden fixed top-4 right-4 z-50 bg-white p-2 rounded-lg ">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
    <!-- Sidebar -->
    <div id="sidebar" class="fixed hidden top-0 left-0 h-full w-[260px] bg-white md:flex flex-col justify-between border-r border-gray-300">
        <!-- Sidebar Header -->
        <div class="pt-6 px-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-700 rounded-full"></div>
                <span class="text-[17px] font-semibold text-gray-800">Gym Owner</span>
            </div>
        </div>

        <!-- Navigation Items -->
        <nav class="flex-1">
            <ul class="space-y-1 px-4 mt-4">
                <li>
                    <a href="#" class="flex items-center space-x-3 py-2 px-4 bg-gray-100 rounded-lg text-gray-800 font-medium">
                        <img src="{{ asset('assets/images/sidebar/home.png') }}" alt="home">
                        <span class="text-[15px]">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <img src="{{ asset('assets/images/sidebar/members.png') }}" alt="home">
                        <span class="text-[15px]">Members</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <img src="{{ asset('assets/images/sidebar/attendance.png') }}" alt="home">
                        <span class="text-[15px]">Attendance</span>
                        <span class="ml-auto bg-blue-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">4</span>
                    </a>
                </li>
                <li>
                    <h3 class="text-[13px] font-semibold text-gray-400 uppercase mt-6 mb-2 px-4">Quick Access</h3>
                </li>
                <li>
                    <a id="more" href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <svg id="arrow" class="w-4 h-4  text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-[15px] pl-4">Quick Access</span>
                    </a>
                    <div id="moreItems" class="pl-12 hidden">
                        <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                            <span class="text-[15px] pl-4">Add Member</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                            <span class="text-[15px] pl-4">Subscriptions</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                            <span class="text-[15px] pl-4">Payment Setting</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-[15px] pl-4">Add Member</span>
                    </a>
                </li>
                <li>
                    <h3 class="text-[13px] font-semibold text-gray-400 uppercase mt-6 mb-2 px-4">Subscriptions</h3>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-[15px] pl-4">Payment Setting</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <img src="{{ asset('assets/images/sidebar/account.png') }}" alt="home">
                        <span class="text-[15px]">Account</span>
                    </a>
                    <form method="POST" action="{{ route('auth.logout') }}" class="md:hidden">
                        @csrf
                        <button type="submit" class="flex w-full items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg text-left">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <img src="{{ asset('assets/images/sidebar/logout.png') }}" alt="logout">
                            <span class="text-[15px]">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Logo at the bottom -->
        <div class="p-4 mx-auto" id="side-logo" style="width: 150px;">
            <img src="{{ asset('assets/images/sidebarlogo.png') }}" alt="Gym Minder Logo" class="w-full h-full object-contain">
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="md:ml-[245px] transition-all duration-300 ease-in-out">
        <!-- Header -->
        <nav class="flex px-4 md:px-12 items-center justify-between p-4 border-b border-gray-300 my-4 bg-white">
            <!-- Left side: Breadcrumb -->
            <div class="text-gray-500">
                <span class="font-semibold">Dashboard</span> / <span>Default</span>
            </div>
    
            <!-- Right side: Icons -->
            <div class="flex items-center space-x-4">
               <!-- Logout Button -->
               <form method="POST" action="{{ route('auth.logout') }}" class="hidden md:block">
                @csrf
                <button type="submit" class="flex cursor-pointer items-center">
                  <img src="{{ asset('assets/images/sidebar/logout.png') }}" alt="logout">
                </button>
            </form>
            </div>
        </nav>

        <!-- Statistics Section -->
        <div class="grid px-4 md:px-12 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Members -->
            <div class="bg-[#E3F5FF] p-6 rounded-xl ">
                <h3 class="text-sm font-medium text-gray-500 mb-4">Total Members</h3>
                <div class="flex items-baseline justify-between">
                    <span class="text-3xl font-bold">370</span>
                    <span class="text-green-500 text-sm">+11.02%</span>
                </div>
            </div>

            <!-- Monthly Revenue -->
            <div class="bg-[#E5ECF6] p-6 rounded-xl ">
                <h3 class="text-sm font-medium text-gray-500 mb-4">Monthly Revenue</h3>
                <div class="flex items-baseline justify-between">
                    <span class="text-3xl font-bold">15080 $</span>
                    <span class="text-green-500 text-sm">+10%</span>
                </div>
            </div>

            <!-- Active Users -->
            <div class="bg-[#E3F5FF] p-6 rounded-xl ">
                <h3 class="text-sm font-medium text-gray-500 mb-4">Active Users</h3>
                <div class="flex items-baseline justify-between">
                    <span class="text-3xl font-bold">267</span>
                    <span class="text-green-500 text-sm">+15.03%</span>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="space-y-6 px-4 md:px-12">
            <!-- Members Attendance Chart -->
            <div class=" p-6 rounded-xl  bg-[#F7F9FB]">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Members attendance</h3>
                <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full bg-blue-400 mr-2"></span>
                        This Month
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full bg-gray-300 mr-2"></span>
                        Last Month
                    </div>
                </div>
                <div class="h-[300px]">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>

            <!-- Revenue Chart -->
            <div class=" p-6 rounded-xl bg-[#F7F9FB]">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Revenue over the past months</h3>
                <div class="h-[200px]">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Attendance Chart
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(attendanceCtx, {
            type: 'line',
            data: {
                labels: ['1', '3', '6', '9', '12', '15', '18', '21', '24', '27', '30'],
                datasets: [
                    {
                        label: 'This Month',
                        data: [0, 70, 90, 150, 120, 90, 150, 180, 200, 220, 280],
                        borderColor: '#60A5FA',
                        tension: 0.4,
                        fill: false
                    },
                    {
                        label: 'Last Month',
                        data: [0, 60, 80, 70, 100, 140, 130, 160, 170, 190, 200],
                        borderColor: '#D1D5DB',
                        tension: 0.4,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'Jun'],
                datasets: [{
                    data: [12000, 14000, 12000, 15000, 10000, 13000],
                    backgroundColor: '#818CF8',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        // Quick Access Toggle
        let more = document.getElementById("more");
        let moreItems = document.getElementById("moreItems");
        let arrow = document.getElementById("arrow");
        more.addEventListener("click", () => {
            moreItems.classList.toggle("hidden");
            document.getElementById("side-logo").classList.toggle("hidden")
        });
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        mobileMenuButton.addEventListener("click",()=>{
            sidebar.classList.toggle("hidden")
        })

    </script>
</body>
</html>
