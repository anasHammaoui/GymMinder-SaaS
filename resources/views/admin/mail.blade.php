<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Subscription Notification</title>
    <style>
        body {
            background-color: #f7fafc;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4299e1;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 24px;
            color: #4a5568;
        }
        .content p {
            margin-bottom: 16px;
        }
        .content ul {
            margin-bottom: 16px;
            padding-left: 20px;
        }
        .content ul li {
            margin-bottom: 8px;
        }
        .button-container {
            text-align: center;
        }
        .button-container a {
            display: inline-block;
            background-color: #4299e1;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #3182ce;
        }
        .footer {
            background-color: #edf2f7;
            text-align: center;
            padding: 16px;
            font-size: 14px;
            color: #a0aec0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Subscription Alert!</h1>
        </div>
        <div class="content">
            <p>Dear Admin,</p>
            <p>We are pleased to inform you that a new subscription has been successfully activated on Gym Minder.</p>
            <p>Here are the details of the user:</p>
            <ul>
                <li><strong>Name:</strong> {{ $user->name }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
            </ul>
            <p>You can view more details and manage this subscription in the admin dashboard:</p>
            <div class="button-container">
                <a href="{{ url('/admin/owners') }}">Go to Admin Dashboard</a>
            </div>
            <p>Best regards,<br>The Gym Minder System</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Gym Minder. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
