<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Activated</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-green-500 text-white text-center py-6">
            <h1 class="text-2xl font-bold">Welcome to Gym Minder!</h1>
        </div>
        <div class="p-6 text-gray-700">
            <p class="mb-4">Dear {{ $user -> name }},</p>
            <p class="mb-4">We are excited to inform you that your subscription to Gym Minder has been successfully activated! You now have full lifetime access to our platform.</p>
            <p class="mb-4">Click the button below to start exploring and managing your fitness journey:</p>
            <div class="text-center">
                <a href="{{ url('/dashboard') }}" class="inline-block bg-green-500 text-white px-6 py-2 rounded-lg text-lg font-medium hover:bg-green-600">Go to Gym Minder</a>
            </div>
            <p class="mt-4">Thank you for choosing Gym Minder!</p>
            <p class="mt-4">Best regards,<br>The Gym Minder Team</p>
        </div>
        <div class="bg-gray-100 text-center py-4 text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Gym Minder. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
