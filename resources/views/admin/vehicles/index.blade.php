<!DOCTYPE html>
<html>
<head>
    <title>Manage Vehicles</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
</head>
<body>
    <div class="container">
        <h1>Manage Vehicles</h1>
        <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary mb-3">Create New Vehicle</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>License Plate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->idVehicle }}</td>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->licensePlate }}</td>
                        <td>
                            <a href="{{ route('admin.vehicles.edit', $vehicle->idVehicle) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.vehicles.destroy', $vehicle->idVehicle) }}" method="POST" style="display:inline-block;">
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
