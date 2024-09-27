<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Credentials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }

        .credentials {
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-top: 20px;
        }

        .credentials p {
            font-weight: bold;
            color: #333;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Welcome to Horeca-Kaya</h1>
        <p>Hello {{ $name }},</p>
        <p>Thank you for registering with us! Below are your login credentials:</p>

        <div class="credentials">
            <p>Email: <span>{{ $email }}</span></p>
            <p>Password: <span>{{ $password }}</span></p>
        </div>

        <p>Please keep your credentials secure and don't share them with anyone.</p>

        <a href="https://horeca-kaya.com/" class="btn">Login Now</a>

        <div class="footer">
            <p>If you didn’t sign up for this account, please contact our support team.</p>
            <p>© 2024 Horeca-Kaya. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
