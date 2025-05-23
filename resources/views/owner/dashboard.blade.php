@extends("layouts.ownerLayout")

    <!-- Main Content -->
    <div id="main-content" class="md:ml-[245px] transition-all duration-300 ease-in-out">
        <!-- Header -->
        <nav class="flex px-4 md:px-12 items-center justify-between p-4 border-b border-gray-300 my-4 bg-white">
            <!-- Left side: Breadcrumb -->
            <div class="text-gray-500">
                <span class="font-semibold">{{ $page }}</span> / <span>Default</span>
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
{{-- dashboard content --}}
@section('content')
<h2 class="px-4 md:px-12 font-semibold text-lg text-gray-800 mb-4">Statistics</h2>
    <!-- Statistics Section -->
    <div class="grid px-4 md:px-12 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Total Members -->
        <div class="bg-[#E3F5FF] p-6 rounded-xl ">
            <h3 class="text-sm font-medium text-gray-500 mb-4">Total Members</h3>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-bold">{{ $members }}</span>
               
            </div>
        </div>

        <!-- Monthly Revenue -->
        <div class="bg-[#E5ECF6] p-6 rounded-xl ">
            <h3 class="text-sm font-medium text-gray-500 mb-4">Monthly Revenue</h3>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-bold">{{ $payment }}$</span>
            </div>
        </div>

        <!-- Active Users -->
        <div class="bg-[#E3F5FF] p-6 rounded-xl ">
            <h3 class="text-sm font-medium text-gray-500 mb-4">Active Users</h3>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-bold">{{ $payedMembers }}</span>
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
@endsection
{{-- dashboard scripts --}}
@section('scripts')
<script>
    // Attendance Chart
    const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceThisMonth = @json($attendancePerMonth['thisMonth']);
    const attendanceLastMonth = @json($attendancePerMonth['lastMonth']);
    const daysInMonth = Array.from({ length: 31 }, (_, i) => i + 1);

    new Chart(attendanceCtx, {
        type: 'line',
        data: {
            labels: daysInMonth,
            datasets: [
                {
                    label: 'This Month',
                    data: daysInMonth.map(day => Math.floor(attendanceThisMonth[day] || 0)),
                    borderColor: '#60A5FA',
                    tension: 0.4,
                    fill: false
                },
                {
                    label: 'Last Month',
                    data: daysInMonth.map(day => Math.floor(attendanceLastMonth[day] || 0)),
                    borderColor: '#A3A3A3',
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
                    },
                    ticks: {
                        stepSize: 1
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
                    display: true
                }
            }
        }
    });

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenuePerMonth = @json(array_values($revenuePerMonth));
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                data: revenuePerMonth,
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

</script>
@endsection