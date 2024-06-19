<!-- admin.tours.index.blade.php -->
@extends('admin.layouts.app')

@section('content')

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
                    <tbody>
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
                                <td class="table-actions" >
                                    <a href="{{ route('admin.tours.edit', $tour->idTour) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('admin.tours.destroy', $tour->idTour) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"class="btn btn-danger btn-sm" >Delete</button>
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

@endsection
