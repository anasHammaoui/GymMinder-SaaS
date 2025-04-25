@extends('layouts.ownerLayout')
@section('content')

<!-- Main Content -->
<div id="main-content" class="md:ml-[245px] transition-all duration-300 ease-in-out">
    <!-- Header -->
    <nav class="flex px-4 md:px-12 items-center justify-between p-4 border-b border-gray-300 my-4 bg-white">
        <!-- Left side: Breadcrumb -->
        <div class="text-gray-500">
            <span class="font-semibold">{{ $page }}</span> / <span>default</span>
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
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-gray-500 pb-8">
                <a href="{{ route('profile.index') }}" class=" text-blue-500 hover:underline">Profile</a> / 
                <a href="{{ route('subscriptions') }}" class="text-blue-500 font-semibold hover:underline">Subscriptions</a>
            </div>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <span class="text-green-500">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <span class="text-red-500">&times;</span>
                    </button>
                </div>
            @endif
            <div class="border border-gray-300 rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-xl font-semibold">Plan: GymMinder</h2>
                        <p class="text-gray-500">Take your Business to the next level with GymMinder.</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-blue-600">$20 one-time</p>
                        <p class="text-sm text-gray-400">One-time payment. No recurring charges.</p>
                        <p class="text-sm text-gray-500 mt-1">Includes lifetime access to all features and priority support.</p>
                    </div>
                </div>

            @if (Auth::user()->is_active)
                <div class="text-green-500 font-semibold mb-4">
                    Your account is active, and your payment is up to date.
                </div>
            @else
                <div class="text-red-500 font-semibold mb-4">
                    Your account is inactive. Please complete your payment to activate your account.
                </div>
                <div class="text-center">
                    <form method="POST" action="{{ route('payment.checkout') }}">
                        @csrf
                        <button 
                            type="submit" 
                            class="bg-blue-500 cursor-pointer text-white px-6 py-2 rounded-lg hover:bg-blue-600"
                        >
                            Pay Now
                        </button>
                    </form>
                </div>

            @endif

               
            </div>
        </div>
    </div>
</div>

@endsection
