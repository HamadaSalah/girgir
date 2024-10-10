<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal Status Update</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
        body {
            background-color: #f7fafc; /* Gray-100 */
            font-family: "Cairo", sans-serif;
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
            <h1>Withdrawal Status Update</h1>
        </div>

        <!-- Body -->
        <div class="body">
            <p>Hello, {{ $record->user->first_name }} {{ $record->user->last_name }}!</p>
            <p>Your withdrawal request has been updated. The current status is: <strong>{{ ucwords($record->status) }}</strong>.</p>
            <p>Here are the details of your withdrawal:</p>

            <ul>
                <li><strong>Amount:</strong> {{ $record->currency }} {{ number_format($record->amount, 2) }}</li>
                <li><strong>IBAN:</strong> {{ $record->IBAN }}</li>
                <li><strong>Bank Name:</strong> {{ $record->bank_name }}</li>
                <li><strong>SWIFT Code:</strong> {{ $record->swift_code }}</li>
                <li><strong>Address:</strong> {{ $record->address }}</li>
                <li><strong>Requested At:</strong> {{ $record->created_at->format('M d, Y H:i') }}</li>
                @if($record->note)
                <li><strong>Notes:</strong> {{ $record->note }}</li>
                @endif
            </ul>

            <p>If you have any questions regarding your withdrawal, feel free to reach out to our support team at any time.</p>

            <p>Cheers,<br>The {{ config('app.name') }} Team</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024 {{ config('app.name') }}, All rights reserved.</p>
        </div>
    </div>
</body>
</html>
