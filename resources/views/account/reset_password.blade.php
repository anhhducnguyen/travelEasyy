<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <form action="{{ route('check_reset_password', ['token' => $token]) }}" method="POST">
        @csrf
        <div>
            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your Password" required class="pass-key">  
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your Password" required class="pass-key">  
        </div>
        <button type="submit">Change Pass</button>
    </form>
</body>
</html>
