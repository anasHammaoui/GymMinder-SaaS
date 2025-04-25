<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="GymMinder">
    <meta name="description" content="'GymMinder is your all-in-one gym management platform. Schedule, track, and grow your fitness business with ease.">
    <meta name="keywords" content="Gym Management, Fitness Software, Gym SaaS, Workout Scheduler, Gym CRM, GymMinder">

    <link rel="icon"  href="{{ asset('assets/images/favicon.png') }}">
    <title>GymMinder {{ $page ?? '' }}</title>
    @vite("resources/css/app.css")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-white">
    
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden fixed top-4 right-4 z-50 bg-white p-2 rounded-lg ">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
    <!-- Sidebar -->
    <div id="sidebar" class="fixed hidden top-0 left-0 h-full w-[260px] bg-white z-50 md:flex flex-col justify-between border-r border-gray-300">
        <!-- Sidebar Header -->
        <div class="pt-6 px-4">
            <div class="flex items-center space-x-3">
                @if(auth()->user()->profile_pic)
                    <img src="{{ Storage::url(auth()->user()->profile_pic) }}" alt="Profile Photo" class="w-10 h-10 rounded-full object-cover">
                @else
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <span class="text-[17px] font-semibold text-gray-800">{{ auth() -> user() -> name }}</span>
            </div>
        </div>

        <!-- Navigation Items -->
        <nav class="flex-1">
            <ul class="space-y-1 px-4 mt-4">
            <li>
            <a href="{{ url('dashboard') }}" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('dashboard') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
                @if(!request()->is('dashboard'))
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                @endif
            <img src="{{ asset('assets/images/sidebar/home.png') }}" alt="home">
            <span class="text-[15px]">Dashboard</span>
            </a>
            </li>
            <li>
            <a href="{{ url('admin/owners') }}" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('admin/owners') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
            @if(!request()->is('admin/owners'))
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
            <img src="{{ asset('assets/images/sidebar/user.png') }}" alt="home">
            <span class="text-[15px]">Gym Owners</span>
            </a>
            </li>
            <li>
            <a href="{{ route('attendance') }}" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('attendance') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
            @if(!request()->is('attendance'))
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
            <img src="{{ asset('assets/images/sidebar/finance.png') }}" alt="home">
            <span class="text-[15px]">Financial Reports</span>
           
            </a>
            </li>
            <li>
          
          
            </li>
              
            <li>
            <a href="profile" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('profile') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
            @if(!request()->is('profile'))
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
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

    @yield('content')
{{-- scripts --}}
    @yield('scripts')
    <script>
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
