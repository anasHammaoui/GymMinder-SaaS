@extends('layouts.adminLayout')
@section('content')

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

    <div class="container mx-auto px-4 md:px-12 py-4">
        <h1 class="text-lg font-medium mb-6">Financial Reports</h1>
        {{-- Success Messages --}}
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.935-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z" />
                </svg>
            </button>
        </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.935-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z" />
                </svg>
            </button>
        </div>
        @endif

        <div class="flex flex-col md:flex-row mb-6">
            <!-- Total Earnings Card -->
            <div class="bg-green-50 p-4 rounded-lg shadow-md md:w-1/4 md:mr-2">
                <h2 class="text-sm font-medium text-gray-700">Total Earnings</h2>
                <p class="text-3xl font-bold text-green-500 py-4">{{ $totalEarning }}$</p>
                <p class="text-xs text-gray-500">{{ now()->format('d-M-Y') }}</p>
            </div>

            <!-- Pending Payments Card -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md md:w-1/4 md:ml-2">
                <h2 class="text-sm font-medium text-gray-700">Pending Payments</h2>
                <p class="text-3xl font-bold text-blue-500 py-4">{{ $pendingEarning }}$</p>
                <p class="text-xs text-gray-500">{{ now()->format('d-M-Y') }}</p>
            </div>
        </div>

        <!-- Filter and Search Bar -->
        <div class="flex rounded-md px-2 justify-between items-center mb-4 bg-[#F7F9FB] py-2">
            <div class="flex space-x-2">
                <a href="?filter=all" class="px-10 py-2 rounded-full border border-gray-300 text-gray-700 {{ request('filter') === 'all' ? 'bg-gray-200' : 'bg-white' }} hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                    All
                </a>
                <a href="?filter=true" class="px-10 py-2 rounded-full border border-gray-300 text-gray-700 {{ request('filter') === 'true' ? 'bg-gray-200' : 'bg-white' }} hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                    Complete
                </a>
                <a href="?filter=null" class="px-10 py-2 rounded-full border border-gray-300 text-gray-700 {{ request('filter') === 'null' ? 'bg-gray-200' : 'bg-white' }} hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                    Pending
                </a>
            </div>
            <div>
            <div class="relative">
                <form class="relative">
                <input type="text" name="query" placeholder="Search" class="border pl-7 border-gray-300 rounded-md px-3 py-1.5 pr-8 w-56 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400" />
                <button type="submit" class="absolute inset-y-0 left-2 flex items-center pr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                </form>
            </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-b border-gray-300">
                <thead>
                    <tr class="text-left text-sm text-gray-500 border-b border-gray-300">
                        <th class="py-3 px-4 font-normal">Owner Id</th>
                        <th class="py-3 px-4 font-normal">Gym Owner</th>
                        <th class="py-3 px-4 font-normal">Business Name</th>
                        <th class="py-3 px-4 font-normal">Amount</th>
                        <th class="py-3 px-4 font-normal">Payment Date</th>
                        <th class="py-3 px-4 font-normal">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($owners as $owner)
                    <tr class="border-b border-gray-300">
                        <td class="py-3 px-4 text-sm">#{{ $owner -> id }}</td>
                        <td class="py-3 px-4 flex items-center">
                            <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white mr-2">
                                A
                            </div>
                            <span class="text-sm">{{ $owner -> name }}</span>
                        </td>
                        <td class="py-3 px-4 text-sm">{{ $owner -> business_name ? $owner -> business_name :  "Not Yet" }}</td>
                        <td class="py-3 px-4 text-sm">{{ $owner -> payment ? $owner -> payment -> amount  .'$': 'Pending'}}</td>
                        <td class="py-3 px-4 text-sm">{{ $owner -> payment ? $owner -> payment -> paymentDate: 'Pending'}}</td>
                        <td class="py-3 px-4">
                            @if( $owner -> is_active)
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="text-green-500 text-sm">Active</span>
                            </div>
                            @else
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                <span class="text-red-500 text-sm">Inactive</span>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
         
    @if ($owners->hasPages())
    <div class="flex justify-end mt-6 space-x-1">
        {{-- Previous Page Link --}}
        @if ($owners->onFirstPage())
            <button class="p-1.5  rounded text-gray-300 cursor-not-allowed" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        @else
            <a href="{{ $owners->previousPageUrl() }}" class="p-1.5  rounded hover:bg-gray-100 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($owners->getUrlRange(1, $owners->lastPage()) as $page => $url)
            @if ($page == $owners->currentPage())
                <span class="px-3 py-1.5  rounded bg-gray-700 text-white">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="px-3 py-1.5  rounded hover:bg-gray-100">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($owners->hasMorePages())
            <a href="{{ $owners->nextPageUrl() }}" class="p-1.5  rounded hover:bg-gray-100 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <button class="p-1.5  rounded text-gray-300 cursor-not-allowed" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        @endif
    </div>
@endif
    </div>
</div>
@endsection