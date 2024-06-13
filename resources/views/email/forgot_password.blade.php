<div>
    <h3>Hi Pass: {{ $user->name }}</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam velit dignissimos id. Sequi, aliquam error dignissimos non illum excepturi? Odit dicta a quae voluptatem, ullam quia praesentium similique porro veritatis.</p>

    <p>
    <a href="{{ route('account.reset_password', $token) }}">Click here</a> <!-- Sửa thành $token -->
    </p>
</div>