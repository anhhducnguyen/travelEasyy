<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header h3 {
            margin: 0;
            color: #2c3e50;
        }
        .content {
            line-height: 1.6;
        }
        .content p {
            margin: 16px 0;
        }
        .content a {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>Hello, {{ $user->name }}!</h3>
        </div>
        <div class="content">
            <p>We received a request to reset your password for your account. If you did not make this request, please ignore this email. Otherwise, click the button below to reset your password:</p>
            <p>
                <a href="{{ route('account.reset_password', $token) }}">Reset Password</a>
            </p>
            <p>If you have any questions or need further assistance, feel free to contact our support team.</p>
            <p>Thank you for being with us!</p>
            <p>Best Regards,<br>Travel Easy</p>
        </div>
        <div class="footer">
            <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
            <p>{{ route('account.reset_password', $token) }}</p>
        </div>
    </div>
</body>
</html>
