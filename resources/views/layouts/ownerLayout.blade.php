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
            <a href="{{ url('owner/members') }}" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('owner/members') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
            @if(!request()->is('owner/members'))
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
            <img src="{{ asset('assets/images/sidebar/members.png') }}" alt="home">
            <span class="text-[15px]">Members</span>
            </a>
            </li>
            <li>
            <a href="{{ route('attendance') }}" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('owner/attendance') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
            @if(!request()->is('owner/attendance'))
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
            <img src="{{ asset('assets/images/sidebar/attendance.png') }}" alt="home">
            <span class="text-[15px]">Attendance</span>
           
            </a>
            </li>
            <li>
            <h3 class="text-[13px] font-semibold text-gray-400 uppercase mt-6 mb-2 px-4">Quick Access</h3>
            </li>
            <li>
            <a id="more" href="#" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('quick-access*') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
            @if(!request()->is('quick-access*'))
            <svg id="arrow" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
            <span class="text-[15px]">Quick Access</span>
            </a>
            <div id="moreItems" class="pl-12 {{ request()->is('quick-access*') ? '' : 'hidden' }}">
            <button  class="openModalBtnAdd flex cursor-pointer items-center space-x-3 py-2 px-4 {{ request()->is('quick-access/add-member') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
                <span class="text-[15px] pl-2">Add Member</span>
            </button>
            <a href="/owner/subscriptions" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('quick-access/subscriptions') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
                <span class="text-[15px] pl-2">Subscriptions</span>
            </a>
            </div>
            </li>
              
            <li>
            <a href="/profile" class="flex items-center space-x-3 py-2 px-4 {{ request()->is('profile') ? 'bg-gray-100 text-gray-800 font-medium' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg">
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
    {{-- add member modal --}}
    {{-- add member modal --}}
 <!-- Modal Overlay -->
 <div id="modalOverlayAdd" class="fixed inset-0 flex items-center justify-center z-50 hidden">


    <div class="absolute inset-0 bg-gray-500/50" id="modalBackdropAdd"></div>
    
    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 z-10">
      <div class="flex justify-between items-center px-6 py-4 border-b">
        <h3 class="font-semibold text-lg text-gray-800">Add New Member</h3>
        <button id="closeModalBtnAdd" class="text-gray-500 hover:text-gray-700">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form id="userForm" action="{{ route("addMember") }}" enctype="multipart/form-data" method="POST" class="p-6">
        @csrf
        <!-- Name Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="name">
            Name
          </label>
          <input
            type="text"
            id="name"
            name="name"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
            placeholder="Enter full name"
          />
        </div>
        
        <!-- Profile Picture Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="profile_picture">
            Profile Picture
          </label>
          <input
            type="file"
            id="profile_picture"
            name="profile_picture"
            accept="image/*"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
          />
        </div>
        
        <!-- Mobile Number Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="mobile_number">
            Mobile Number
          </label>
          <input
            type="tel"
            id="mobile_number"
            name="mobile_number"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
            placeholder="+1234567890"
          />
        </div>

        <!-- Email Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
            Email
          </label>
          <input
            type="email"
            id="email"
            name="email"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
            placeholder="user@example.com"
          />
        </div>

        <!-- Plan Field -->
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="plan">
            Plan
          </label>
          <select
            id="plan"
            name="plan"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
          >
            <option value="">Select a plan</option>
            <option value="Monthly">Monthly</option>
            <option value="Yearly">Yearly</option>
          </select>
        </div>

        <!-- Form Buttons -->
        <div class="flex space-x-2">
          <button
            type="button"
            id="cancelBtnAdd"
            class="w-1/2 cursor-pointer py-2 px-4 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50"
          >
            Cancel
          </button>
          <button
            type="submit"
            class="w-1/2 cursor-pointer py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700"
          >
            Add Member
          </button>
        </div>
      </form>
    </div>
  </div>

{{-- scripts --}}
    @yield('scripts')
    <script>
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
    // ************************Add member modal
    // Modal elements
    const openModalBtnAdd = document.querySelectorAll('.openModalBtnAdd');
    const closeModalBtnAdd = document.getElementById('closeModalBtnAdd');
    const modalOverlayAdd = document.getElementById('modalOverlayAdd');
    const modalBackdropAdd = document.getElementById('modalBackdropAdd');
    const cancelBtnAdd = document.getElementById('cancelBtnAdd');
    
    // Open modal
    openModalBtnAdd.forEach(btn => {
        btn.addEventListener('click', () => {
      modalOverlayAdd.classList.remove('hidden');
    });
    });

    // Close modal function
    function closeModal() {
      modalOverlayAdd.classList.add('hidden');
    }

    // Close modal event listeners
    closeModalBtnAdd.addEventListener('click', closeModal);
    modalBackdropAdd.addEventListener('click', closeModal);
    cancelBtnAdd.addEventListener('click', closeModal);

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeModal();
    });
    </script>
</body>
</html>
