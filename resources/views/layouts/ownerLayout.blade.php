<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymMinder {{ $page ?? '' }}</title>
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
                        <span class="text-[15px] ">Quick Access</span>
                    </a>
                    <div id="moreItems" class="pl-12 hidden">
                        <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                            <span class="text-[15px] pl-2">Add Member</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                            <span class="text-[15px] pl-2">Subscriptions</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                            <span class="text-[15px] pl-2">Payment Setting</span>
                        </a>
                    </div>
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
    @yield('content')
{{-- scripts --}}
    @yield('scripts')
</body>
</html>
