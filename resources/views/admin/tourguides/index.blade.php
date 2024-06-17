<!-- admin.tourguides.index.blade.php -->
@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Tour Guides</h4>
            <a href="{{ route('admin.tourguides.create') }}" class="btn btn-primary mb-3">Create New Tour Guide</a>           
            <div class="table-responsive">
                <table class="table table-striped">
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
                                <td class="table-actions">
                                    <a href="{{ route('admin.tourguides.edit', $tourGuide->idTourGuide) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('admin.tourguides.destroy', $tourGuide->idTourGuide) }}" method="POST" style="display:inline-block;">
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
@endsection
