@extends("layouts.ownerLayout")
{{-- dashboard content --}}
@section('content')
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
@endsection
{{-- dashboard scripts --}}
@section('scripts')
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
@endsection