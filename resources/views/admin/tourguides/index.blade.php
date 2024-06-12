<!DOCTYPE html>
<html>
<head>
    <title>Manage Tour Guides</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
</head>
<body>
    <div class="container">
        <h1>Manage Tour Guides</h1>
        <a href="{{ route('admin.tourguides.create') }}" class="btn btn-primary mb-3">Create New Tour Guide</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Address</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tourGuides as $tourGuide)
                    <tr>
                        <td>{{ $tourGuide->idTourGuide }}</td>
                        <td>{{ $tourGuide->address->city }}, {{ $tourGuide->address->district }}, {{ $tourGuide->address->ward }}, {{ $tourGuide->address->detailAddress }}</td>
                        <td>{{ $tourGuide->name }}</td>
                        <td>{{ $tourGuide->phone }}</td>
                        <td>{{ $tourGuide->email }}</td>
                        <td>
                            <a href="{{ route('admin.tourguides.edit', $tourGuide->idTourGuide) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.tourguides.destroy', $tourGuide->idTourGuide) }}" method="POST" style="display:inline-block;">
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
