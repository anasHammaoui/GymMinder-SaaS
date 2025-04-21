@extends('layouts.ownerLayout')
@section('content')
<div class="container mx-auto px-4 md:px-12 py-4">
    <h1 class="text-lg font-medium mb-6">Members List</h1>
    
    <div class="flex rounded-md px-2 justify-between items-center mb-4 bg-[#F7F9FB] py-2">
        <div class="flex space-x-2">
            <button class="p-2 cursor-pointer  hover:bg-gray-100">
                <img src="{{ asset("assets/images/sidebar/plus.png") }}" alt="plus">
            </button>
            <button class="p-2 cursor-pointer  hover:bg-gray-100">
                <img src="{{ asset("assets/images/sidebar/filter.png") }}" alt="filter">
            </button>
            <button class="p-2 cursor-pointer  hover:bg-gray-100">
                <img src="{{ asset("assets/images/sidebar/order.png") }}" alt="order">
            </button>
        </div>
        <div>
            <div class="relative">
                <input type="text" placeholder="Search" class="border pl-7 border-gray-300 rounded-md px-3 py-1.5 pr-8 w-56 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400" />
                <div class="absolute inset-y-0 left-2 flex items-center pr-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full border-b border-gray-300">
            <thead>
                <tr class="text-left text-sm text-gray-500 border-b border-gray-300">
                    <th class="py-3 px-4 font-normal">Member Id</th>
                    <th class="py-3 px-4 font-normal">Member</th>
                    <th class="py-3 px-4 font-normal">Plan</th>
                    <th class="py-3 px-4 font-normal">Join</th>
                    <th class="py-3 px-4 font-normal">Next Payment</th>
                    <th class="py-3 px-4 font-normal">Status</th>
                    <th class="py-3 px-4 font-normal">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($members as  $member)
              <tr class="border-b border-gray-300">
                <td class="py-3 px-4 text-sm">#{{ $member -> id }}</td>
                <td class="py-3 px-4 flex items-center">
                    <img src="{{ asset('images/avatar1.jpg') }}" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                    <span class="text-sm">{{ $member -> name }}</span>
                </td>
                <td class="py-3 px-4 text-sm">{{ $member-> plan }}</td>
                <td class="py-3 px-4 text-sm">{{ $member-> created_at -> format('M j, Y') }}</td>
                <td class="py-3 px-4 text-sm">
                    <div class="flex items-center">
                        <svg class="h-4 w-4 mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                       wait
                    </div>
                </td>
                <td class="py-3 px-4"><span class="text-blue-500 text-sm">• wait</span></td>
                <td class="py-3 px-4">
                    <button class="bg-[#6D6D6D] cursor-pointer text-white text-xs px-4 py-1.5 rounded-md mr-2">Edit</button>
                    <button class="bg-[#DA4343] cursor-pointer text-white text-xs px-4 py-1.5 rounded-md">Delete</button>
                </td>
            </tr>
              @endforeach
        
            </tbody>
        </table>
    </div>
    
    @if ($members->hasPages())
        <div class="flex justify-end mt-6 space-x-1">
            {{-- Previous Page Link --}}
            @if ($members->onFirstPage())
                <button class="p-1.5  rounded text-gray-300 cursor-not-allowed" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            @else
                <a href="{{ $members->previousPageUrl() }}" class="p-1.5  rounded hover:bg-gray-100 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($members->getUrlRange(1, $members->lastPage()) as $page => $url)
                @if ($page == $members->currentPage())
                    <span class="px-3 py-1.5  rounded bg-gray-700 text-white">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1.5  rounded hover:bg-gray-100">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($members->hasMorePages())
                <a href="{{ $members->nextPageUrl() }}" class="p-1.5  rounded hover:bg-gray-100 text-gray-500">
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
@endsection