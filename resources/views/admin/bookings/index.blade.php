@extends('admin.layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Bookings</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Tour ID</th>
                            <th>Quantity Ticket</th>
                            <th>Confirmation Status</th>
                            <th>Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->idBooking }}</td>
                            <td>{{ $booking->idUser }}</td>
                            <td>{{ $booking->idTour }}</td>
                            <td>{{ $booking->quantityTicket }}</td>
                            <td>
                                <label class="badge {{ $booking->confirmation_status === 'waiting_for_admin' ? 'badge-warning' : ($booking->confirmation_status === 'confirmed' ? 'badge-success' : 'badge-secondary') }}">
                                    {{ ucfirst(str_replace('_', ' ', $booking->confirmation_status)) }}
                                </label>
                            </td>
                            <td>
                                <label class="badge {{ $booking->payment_status === 'unpaid' ? 'badge-warning' : ($booking->payment_status === 'paid' ? 'badge-success' : 'badge-secondary') }}">
                                    {{ ucfirst($booking->payment_status) }}
                                </label>
                            </td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking->idBooking) }}" class="btn btn-info btn-sm">View Detail</a>
                                <form action="{{ route('admin.bookings.destroy', $booking->idBooking) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                                </form>
                                @if ($booking->confirmation_status === 'waiting_for_admin')
                                <form action="{{ route('admin.bookings.confirm', $booking->idBooking) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to confirm this booking?')">Confirm</button>
                                </form>
                                @endif
                                @if ($booking->payment_status === 'unpaid')
                                <form action="{{ route('admin.bookings.pay', $booking->idBooking) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to confirm payment for this booking?')">Confirm Payment</button>
                                </form>
                                @endif
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
