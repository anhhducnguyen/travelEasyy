<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('account.check-forgot-password') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="example@email.com">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Send Mail</button>
    </form>
</body>
</html>
