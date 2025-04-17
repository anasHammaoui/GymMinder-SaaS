@extends("Layouts.authLayout")
@section("authpage")
<div class="flex min-h-screen">
    <!-- Left Section - Sign Up Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <h2 class="text-2xl font-bold mb-8 text-gray-900">Join To GymMinder</h2>
            @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form class="space-y-6" method="POST" action="{{ route('auth.register') }}">
                @csrf
                
                <!-- Full Name -->
                <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input id="first_name" type="text" name="name"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]"
                            placeholder="Full Name">
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" 
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]"
                        placeholder="user@contact.com">
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" 
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]" placeholder="******************">
                   
                </div>
                
                <!-- Terms of Service -->
                <div class="text-sm text-gray-500">
                    By joining GymMinder you are agreeing our 
                    <a  class="text-indigo-600 hover:text-indigo-500">Terms of Service</a> and
                    <a  class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                </div>
                
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        SignUp
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <span class="text-sm text-gray-600">Already have an account? </span>
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Login!</a>
            </div>
        </div>
    </div>
    
    <!-- Right Section - Brand/Logo Section -->
    <div class="hidden lg:block lg:w-1/2 bg-indigo-700">
        <div class="flex flex-col items-center justify-center h-full px-8 text-white">
            <div class="mb-8">
                <img src="./assets/images/LogoWhite.png" alt="GymMinder Logo" class="w-64">
            </div>
            <h2 class="text-2xl font-bold mb-4 text-center">Join Gym Minder Today!</h2>
            <p class="text-center text-lg">
                Create your account and simplify your gym operations. Start managing memberships, tracking payments, and growing your gym hassle-free.
            </p>
        </div>
    </div>
</div>
@endsection