<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        /* Importing Cairo font */
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            background-color: #f7fafc; /* Gray-100 */
            font-family: 'Cairo', sans-serif; /* Set font to Cairo */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #931158; /* Custom Color */
            color: white;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .body {
            padding: 30px;
            color: #4a5568; /* Gray-700 */
        }

        .body p {
            margin: 16px 0;
        }

        .cta {
            text-align: center;
            margin-top: 20px;
        }

        .cta a {
            background-color: #931158; /* Custom Color */
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
        }

        .cta a:hover {
            background-color: #7b0d4c; /* Darker shade for hover */
        }

        .footer {
            background-color: #edf2f7; /* Gray-200 */
            text-align: center;
            padding: 10px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            color: #a0aec0; /* Gray-400 */
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Welcome to {{ config('app.name') }}!</h1>
        </div>

        <!-- Body -->
        <div class="body">
            <p>Hello, {{ $user->name }}!</p>
            <p>Our admin invites you to be a <strong>{{ ucwords(str_replace('_', ' ', $user->type)) }}</strong> at {{ config('app.name') }}.</p>
            <p>To get started, click the button below to log in with the following default credentials:</p>

            <p><strong>Email:</strong> {{ $user->email }}<br>
            <strong>Password:</strong> <span style="color: #931158; font-weight: bold;">Password</span> <span style="font-size: 12px; color: #718096;">(You can change this after logging in)</span></p>

            <!-- Call to Action -->
            <div class="cta">
                <a href="{{ route('home') }}">Log In Now</a>
            </div>

            <p>If you have any questions, feel free to reach out to our support team at any time.</p>

            <p>Cheers,<br>
            The {{ config('app.name') }} Team</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024 {{ config('app.name') }}, All rights reserved.</p>
        </div>
    </div>
</body>
</html>
