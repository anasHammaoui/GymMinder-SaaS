<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unauthorized - GymMinder</title>
    @vite("resources/css/app.css")
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center px-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="bg-red-600 py-4">
                <svg class="mx-auto h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            
            <div class="px-6 py-8 text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Access Denied</h1>
                <p class="text-gray-600 mb-6">Sorry, you don't have permission to access this page.</p>
                
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                        <a href="{{ url('/') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-medium transition">
                            Return to Home
                        </a>
                        <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md font-medium transition">
                            Go Back
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-4 bg-gray-50 text-center text-sm text-gray-500 border-t border-gray-200">
                &copy; {{ date('Y') }} GymMinder - All rights reserved
            </div>
        </div>
    </div>
</body>
</html>
