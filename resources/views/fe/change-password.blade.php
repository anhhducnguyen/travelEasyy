<!-- resources/views/fe/change-password.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div>
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" required>
        </div>
        <div>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" required>
        </div>
        <div>
            <button type="submit">Change Password</button>
        </div>
    </form>
</body>
</html>
