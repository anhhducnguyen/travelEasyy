<!-- resources/views/admin/bookings/show.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booking Details</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $booking->idBooking }}</td>
                            </tr>
                            <tr>
                                <th>User ID</th>
                                <td>{{ $booking->idUser }}</td>
                            </tr>
                            <tr>
                                <th>User Name</th>
                                <td>{{ $booking->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $booking->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $booking->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Tour ID</th>
                                <td>{{ $booking->idTour }}</td>
                            </tr>
                            <tr>
                                <th>Tour Name</th>
                                <td>{{ $booking->tour->name }}</td>
                            </tr>
                            <tr>
                                <th>Start Day</th>
                                <td>{{ $booking->tour->startDay }}</td>
                            </tr>
                            <tr>
                                <th>End Day</th>
                                <td>{{ $booking->tour->endDay }}</td>
                            </tr>
                            <tr>
                                <th>Quantity Ticket</th>
                                <td>{{ $booking->quantityTicket }}</td>
                            </tr>
                            <tr>
                                <th>Confirmation Status</th>
                                <td>{{ ucfirst(str_replace('_', ' ', $booking->confirmation_status)) }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{ ucfirst($booking->payment_status) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
