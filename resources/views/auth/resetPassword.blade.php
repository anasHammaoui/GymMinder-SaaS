@extends("Layouts.authLayout")
@section("authpage")
<div class="flex min-h-screen">
    <!-- Left Section - Sign Up Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <h2 class="text-2xl font-bold mb-8 text-gray-900">Reset Password Page</h2>
            
            <form class="space-y-6">
                @csrf
                <!-- Password -->
                <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Enter New Password</label>
                    <input id="password" type="password" name="password" placeholder="******************"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]">
                   
                </div>
                <!-- confirm Password -->
                <div>
                    <div class="flex justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    </div>
                    <input id="password" type="password" name="password" placeholder="******************"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-[#F3F4F6]">
                   
                </div>
                
                
                <!-- Submit Button -->
                <div>
                    <button type="button" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Reset Password
                    </button>
                </div>
            </form>
            
        </div>
    </div>
    
    <!-- Right Section - Brand/Logo Section -->
    <div class="hidden lg:block lg:w-1/2 bg-indigo-700">
        <div class="flex flex-col items-center justify-center h-full px-8 text-white">
            <div class="mb-8">
                <img src="./assets/images/LogoWhite.png" alt="GymMinder Logo" class="w-64">
            </div>
            <h2 class="text-2xl font-bold mb-4 text-center">Reset Your Password</h2>
            <p class="text-center text-lg"> 
                Create a new password to secure your account. Make sure it’s strong and unique to keep your gym data safe.
            </p>
        </div>
    </div>
</div>
@endsection