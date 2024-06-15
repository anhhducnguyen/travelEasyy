@extends('admin.layouts.app')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Users List</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>District</th>
                            <th>Ward</th>
                            <th>DetailAddress</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? 'N/A' }}</td>
                                <!-- <td>{{ $user->address->city ?? 'N/A'}}, {{ $user->address->district ?? 'N/A'}}, {{ $user->address->ward ?? 'N/A'}}, {{ $user->address->detailAddress?? 'N/A' }}</td> -->
                                <td>{{ $user->address->city ?? 'N/A'}}</td>
                                <td>{{ $user->address->district ?? 'N/A'}}</td>
                                <td>{{ $user->address->ward ?? 'N/A'}}</td>
                                <td>{{ $user->address->detailAddress ?? 'N/A'}}</td>
                                <td class="table-actions" >
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
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
