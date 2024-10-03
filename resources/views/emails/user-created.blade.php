<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-2xl mx-auto my-10 bg-white rounded-lg shadow-lg">
        <!-- Header -->
        <div class="bg-[#931158] text-white text-center py-6 rounded-t-lg">
            <h1 class="text-2xl font-bold">Welcome to Our {{ config('app.name') }}!</h1>
        </div>

        <!-- Body -->
        <div class="p-8">
            <p class="text-gray-700 text-lg">
                Hello, {{ $user->name }}!
            </p>
            <p class="mt-4 text-gray-600">
                Our admin invites you to be a <strong>{{ ucwords(str_replace('_', ' ', $user->type)) }}</strong> at {{ config('app.name') }}.
            </p>
            <p class="mt-4 text-gray-600">
                To get started, click the button below to log in with the following default credentials:
            </p>

            <p class="mt-4 text-gray-600">
                <strong>Email:</strong> {{ $user->email }}<br>
                <strong>Password:</strong> <span class="text-[#931158] font-bold">Password</span> <span class="text-sm text-gray-500">(You can change this after logging in)</span>
            </p>

            <!-- Call to Action -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="bg-[#931158] text-white py-3 px-6 rounded-lg shadow-lg hover:bg-[#7b0d4c]">
                    Log In Now
                </a>
            </div>

            <p class="mt-6 text-gray-600">
                If you have any questions, feel free to reach out to our support team at any time.
            </p>

            <p class="mt-4 text-gray-600">
                Cheers,<br>
                The {{ config('app.name') }} Team
            </p>
        </div>

        <!-- Footer -->
        <div class="bg-gray-200 text-center py-4 rounded-b-lg">
            <p class="text-gray-500 text-sm">
                © 2024 {{ config('app.name') }}, All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
