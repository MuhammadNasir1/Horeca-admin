<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Approved</title>
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
            text-align: center;
            color: {{ $status == 'pending' ? '#921B1BFF' : '#4CAF50' }};
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }

        .button {
            display: block;
            width: fit-content;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            text-align: center;
            margin: 20px auto;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Registration {{ $status }}</h1>
        <p>Hello {{ $name }},</p>
        <p>We are pleased to inform you that your registration has been {{ $status }} by our admin team.</p>
        @if ($status == 'approved')
            <p>To log in to your account, click the button below:</p>
            <a href="https://horeca-kaya.com/" class="button">Login to Your Account</a>
        @endif
        <p>If you have any questions or need further assistance, feel free to contact our support team.</p>
        <p>Thank you for joining us!</p>
    </div>
    <div class="footer">
        &copy; 2024 Your Company. All rights reserved.
    </div>
</body>

</html>
