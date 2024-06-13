<!DOCTYPE html>
<html>
<head>
    <title>Manage Hotels</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
</head>
<body>
    <div class="container">
        <h1>Manage Hotels</h1>
        <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary mb-3">Create New Hotel</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->idHotel }}</td>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->address->city }}, {{ $hotel->address->district }}, {{ $hotel->address->ward }}, {{ $hotel->address->detailAddress }}</td>
                        <td>
                            <a href="{{ route('admin.hotels.edit', $hotel->idHotel) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.hotels.destroy', $hotel->idHotel) }}" method="POST" style="display:inline-block;">
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
