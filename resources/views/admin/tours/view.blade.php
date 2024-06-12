


    <div class="container">
        <h1>Manage Tours</h1>
        <a href="{{ route('admin.tours.create') }}" class="btn btn-primary mb-3">Create New Tour</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Day</th>
                    <th>End Day</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tours as $tour)
                    <tr>
                        <td>{{ $tour->idTour }}</td>
                        <td>{{ $tour->name }}</td>
                        <td>{{ session('tour_description') }}</td>
                        <td>{{ $tour->startDay }}</td>
                        <td>{{ $tour->endDay }}</td>
                        <td>{{ $tour->cost }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

