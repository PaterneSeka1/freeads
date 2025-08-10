<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to our website</title>
</head>
<body>
    <h1>Welcome to our website</h1>
    <p>Thank you for registering on our website.</p>
    <p>Your email is: {{ $user->email }}</p>
    <p>Thank you for registering on our website.</p>
    <p>Please click the link below to verify your email:</p>
    <a href="{{ url('/email/verify/' . $user->id . '/' . $user->email_verification_token) }}">Verify Email</a>
</body>
</html>