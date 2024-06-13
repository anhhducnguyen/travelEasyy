<!DOCTYPE html>
<html>
<head>
    <title>Manage Tours</title>
</head>
<body>
    <h2>Manage Tours</h2>
    <a href="{{ route('admin.tours.create') }}">Create New Tour</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Day</th>
                <th>End Day</th>
                <th>Cost</th>
                <th>Address</th>
                <th>Hotel</th>
                <th>Vehicle</th>
                <th>Tour Guide</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
            <tr>
                <td>{{ $tour->idTour }}</td>
                <td>{{ $tour->name }}</td>
                <td>{{ $tour->startDay }}</td>
                <td>{{ $tour->endDay }}</td>
                <td>{{ $tour->cost }}</td>
                <td>{{ $tour->address->city }}, {{ $tour->address->district }}, {{ $tour->address->ward }}, {{ $tour->address->detailAddress }}</td>
                <td>{{ $tour->hotel->name ?? 'N/A' }}</td>
                <td>{{ $tour->vehicle->name ?? 'N/A' }}</td>
                <td>{{ $tour->tourGuide->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.tours.edit', $tour->idTour) }}">Edit</a>
                    <form action="{{ route('admin.tours.destroy', $tour->idTour) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
