<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            padding: 20px;
            margin: 20px;
        }

        .email-header h1 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .email-body {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
        }

        .reset-button {
            display: inline-block;
            background-color: #4285f4;
            color: white !important;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .reset-button:hover {
            background-color: #357ae8;
        }

        .email-footer {
            margin-top: 30px;
            text-align: center;
            color: #777777;
            font-size: 14px;
        }
    </style>
</head>

<body>
    {{-- <div class="email-container">
        <div class="email-header">
            <h1>Reset Your Password</h1>
        </div>
        <div class="email-body">
            <p>Hello [User], {{ $otp }}</p>
            <p>We received a request to reset your password. Please click the button below to reset it:</p>
            <a href="http://horeca-kaya.com/resetPassword" class="reset-button">Reset Password</a>
            <p>If you didn’t request a password reset, you can ignore this email.</p>
            <p>Thanks,<br>The Horeca-kaya Team</p>
        </div>
        <div class="email-footer">
            <p>© 2024 Horeca-kaya. All rights reserved.</p>
        </div>
    </div> --}}
    <div class="email-container">
        <div class="email-header">
            <h1>Passwort zurücksetzen</h1>
        </div>
        <div class="email-body">
            <p>Hallo [Benutzer], {{ $otp }}</p>
            <p>Wir haben eine Anfrage zum Zurücksetzen Ihres Passworts erhalten. Bitte klicken Sie auf die Schaltfläche unten, um es zurückzusetzen:</p>
            <a href="http://horeca-kaya.com/resetPassword" class="reset-button">Passwort zurücksetzen</a>
            <p>Wenn Sie kein Zurücksetzen des Passworts angefordert haben, können Sie diese E-Mail ignorieren.</p>
            <p>Danke,<br>Das Horeca-Kaya-Team</p>
        </div>
        <div class="email-footer">
            <p>© 2024 Horeca-Kaya. Alle Rechte vorbehalten.</p>
        </div>
    </div>

</body>

</html>
