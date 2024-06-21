@extends('admin.layouts.app')

@section('content')

<li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
    <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{ route('admin.tours.index') }}">
        <div class="input-group">
            <input type="text" id="searchInput" name="search" class="form-control" placeholder="Search by ID or Name" value="{{ request('search') }}" onkeyup="searchTours()" />
            <input type="number" id="numDays" name="num_days" class="form-control ml-2" placeholder="Number of Days" onkeyup="searchTours()" />
        </div>
    </form>
</li>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Tours</h4>
            <a href="{{ route('admin.tours.create') }}" class="btn btn-primary mb-3">Create New Tour</a>
            <div class="table-responsive">
                <table class="table table-striped">
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="toursTableBody">
                        @foreach ($tours as $tour)
                            <tr>
                                <td>{{ $tour->idTour }}</td>
                                <td>{{ $tour->name }}</td>
                                <td>{{ $tour->startDay }}</td>
                                <td>{{ $tour->endDay }}</td>
                                <td>{{ $tour->cost }}</td>
                                <td>{{ $tour->address->detailAddress }}, {{ $tour->address->ward }}, {{ $tour->address->district }}, {{ $tour->address->city }}</td>
                                <td>{{ $tour->hotel->name ?? 'N/A' }}</td>
                                <td>{{ $tour->vehicle->name ?? 'N/A' }}</td>
                                <td>{{ $tour->tourGuide->name ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $now = now();
                                        $endDay = \Carbon\Carbon::parse($tour->endDay);
                                        $statusClass = $endDay->lessThan($now) ? 'badge-danger' : 'badge-success';
                                        $statusText = $endDay->lessThan($now) ? 'Expired' : 'Active';
                                    @endphp
                                    <label class="badge {{ $statusClass }}">{{ $statusText }}</label>
                                </td>
                                <td class="table-actions">
                                    <a href="{{ route('admin.tours.edit', $tour->idTour) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('admin.tours.destroy', $tour->idTour) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function searchTours() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const numDays = document.getElementById('numDays').value;
    const tableBody = document.getElementById('toursTableBody');
    const rows = tableBody.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let cells = row.getElementsByTagName('td');
        let id = cells[0].innerText.toLowerCase();
        let name = cells[1].innerText.toLowerCase();
        let startDay = new Date(cells[2].innerText);
        let endDay = new Date(cells[3].innerText);
        let duration = (endDay - startDay) / (1000 * 60 * 60 * 24) + 1; // Calculate the number of days

        let showRow = true;

        if (input && !(id.includes(input) || name.includes(input))) {
            showRow = false;
        }

        if (numDays && duration != numDays) {
            showRow = false;
        }

        row.style.display = showRow ? '' : 'none';
    }
}
</script>

@endsection
