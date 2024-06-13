<!DOCTYPE html>
<html>
<head>
    <title>Manage Agencies</title>
</head>
<body>
    <div class="container">
        <h1>Manage Agencies</h1>
        <a href="{{ route('admin.agencies.create') }}" class="btn btn-primary mb-3">Create New Agency</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Tour Guide</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agencies as $agency)
                    <tr>
                        <td>{{ $agency->idAgency }}</td>
                        <td>{{ $agency->name }}</td>
                        <td>{{ $agency->phone }}</td>
                        <td>{{ $agency->tourGuide ? $agency->tourGuide->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.agencies.edit', $agency->idAgency) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.agencies.destroy', $agency->idAgency) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
