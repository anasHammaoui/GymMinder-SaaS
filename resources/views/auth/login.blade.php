@extends("Layouts.mainLayout")
@section("content")

<div class="flex min-h-screen">
    <!-- Left Section - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <h2 class="text-2xl font-bold mb-8 text-gray-900">Login Page</h2>
            @if (session('success'))
            <div class="mb-4 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-3 text-center">
                <svg class="inline w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if (session('status'))
        <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-700 px-4 py-3 text-sm">
            {{ session('status') }}
        </div>
    @endif
            @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form class="space-y-6" method="POST" action="{{ route("auth.login") }}">
                @csrf
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" 
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]"
                        placeholder="user@contact.com">
                </div>
                
                <!-- Password -->
                <div>
                    <div class="flex justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <a href="{{ route("password.request") }}" class="block text-sm font-medium  mb-1 text-indigo-500">Forget Password?</a>
                    </div>
                    <input id="password" type="password" name="password" placeholder="******************"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]">
                   
                </div>
                
                
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Login
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <span class="text-sm text-gray-600">Don't have Account? </span>
                <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Register Now!</a>
            </div>
        </div>
    </div>
    
    <!-- Right Section - Brand/Logo Section -->
    <div class="hidden lg:block lg:w-1/2 bg-indigo-700">
        <div class="flex flex-col items-center justify-center h-full px-8 text-white">
            <div class="mb-8">
                <img src="./assets/images/LogoWhite.png" alt="GymMinder Logo" class="w-64">
            </div>
            <h2 class="text-2xl font-bold mb-4 text-center">Welcome Back to Gym Minder!</h2>
            <p class="text-center text-lg"> 
                Log in to your account and take control of your gym management. Track memberships, handle payments, and keep your business running smoothly.
            </p>
        </div>
    </div>
</div>
@endsection