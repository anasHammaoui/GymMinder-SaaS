<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Activated</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 40rem;
            margin: 2.5rem auto;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #10b981;
            color: #ffffff;
            text-align: center;
            padding: 1.5rem 0;
        }
        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }
        .content {
            padding: 1.5rem;
            color: #374151;
        }
        .content p {
            margin-bottom: 1rem;
        }
        .button-container {
            text-align: center;
        }
        .button-container a {
            display: inline-block;
            background-color: #10b981;
            color: #ffffff;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #059669;
        }
        .footer {
            background-color: #f3f4f6;
            text-align: center;
            padding: 1rem 0;
            font-size: 0.875rem;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Gym Minder!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $user->name }},</p>
            <p>We are excited to inform you that your subscription to Gym Minder has been successfully activated! You now have full lifetime access to our platform.</p>
            <p>Click the button below to start exploring and managing your fitness journey:</p>
            <div class="button-container">
                <a href="{{ url('/dashboard') }}">Go to Gym Minder</a>
            </div>
            <p>Thank you for choosing Gym Minder!</p>
            <p>Best regards,<br>The Gym Minder Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Gym Minder. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
