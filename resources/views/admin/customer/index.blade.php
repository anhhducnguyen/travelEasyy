<!DOCTYPE html>
<html>
<head>
    <title>Manage Customer</title>
</head>
<body>
    <div class="container">
        <h1>Manage Customer</h1>
        <a href="{{ route('admin.customer.create') }}" class="btn btn-primary mb-3">Create New Customer</a>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->phone }}</td>
                        <!-- <td>{{ $user->idAddress }}</td> -->
                        <td>{{ $user->address->city }}, {{ $user->address->district }}, {{ $user->address->ward }}, {{ $user->address->detailAddress }}</td>
                        <td>
                            <form action="{{ route('admin.customer.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>