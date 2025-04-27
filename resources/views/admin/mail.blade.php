<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Subscription Notification</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-500 text-white text-center py-6">
            <h1 class="text-2xl font-bold">New Subscription Alert!</h1>
        </div>
        <div class="p-6 text-gray-700">
            <p class="mb-4">Dear Admin,</p>
            <p class="mb-4">We are pleased to inform you that a new subscription has been successfully activated on Gym Minder.</p>
            <p class="mb-4">Here are the details of the user:</p>
            <ul class="mb-4">
                <li><strong>Name:</strong> {{ $user->name }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
            </ul>
            <p class="mb-4">You can view more details and manage this subscription in the admin dashboard:</p>
            <div class="text-center">
                <a href="{{ url('/admin/owners') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg text-lg font-medium hover:bg-blue-600">Go to Admin Dashboard</a>
            </div>
            <p class="mt-4">Best regards,<br>The Gym Minder System</p>
        </div>
        <div class="bg-gray-100 text-center py-4 text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Gym Minder. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
