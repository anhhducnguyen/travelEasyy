@extends('admin.layouts.app')

@section('content')
<!-- test -->
<li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
    <div class="nav-link form-inline mt-2 mt-md-0">
        <div class="input-group">
        <select id="confirmationStatusSelect" class="form-control ml-2">
            <option value="">All Confirmation Status</option>
            <option value="Waitting">Waiting for admin</option>
            <option value="Confirmed">Confirmed</option>
        </select>
        <select id="paymentStatusSelect" class="form-control ml-2">
            <option value="">All Payment Status</option>
            <option value="Unpaid">Unpaid</option>
            <option value="Paid">Paid</option>
        </select>
            <button type="button" class="btn btn-primary ml-2" onclick="filterTable()">Filter</button>
        </div>
    </div>
</li>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Bookings</h4>
            <div class="table-responsive">
                <table class="table table-striped" id="bookingsTable">
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
                            <td class="confirmation-status">
                                <label class="badge {{ $booking->confirmation_status === 'waiting_for_admin' ? 'badge-warning' : ($booking->confirmation_status === 'confirmed' ? 'badge-success' : 'badge-secondary') }}">
                                    {{ $booking->confirmation_status === 'waiting_for_admin' ? 'Waitting' : 'Confirmed' }}
                                </label>
                            </td>
                            <td class="payment-status">
                                <label class="badge {{ $booking->payment_status === 'unpaid' ? 'badge-warning' : ($booking->payment_status === 'paid' ? 'badge-success' : 'badge-secondary') }}">
                                    {{ $booking->payment_status === 'unpaid' ? 'Unpaid' : 'Paid' }}
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

<script>
    function filterTable() {
        const confirmationStatus = document.getElementById('confirmationStatusSelect').value.toLowerCase();
        const paymentStatus = document.getElementById('paymentStatusSelect').value.toLowerCase();
        const table = document.getElementById('bookingsTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');
            let showRow = true;

            // Check confirmation status
            if (confirmationStatus) {
                let confirmationStatusText = td[4].querySelector('label').textContent.toLowerCase().trim();
                if (confirmationStatusText !== confirmationStatus) {
                    showRow = false;
                }
            }

            // Check payment status
            if (paymentStatus) {
                let paymentStatusText = td[5].querySelector('label').textContent.toLowerCase().trim();
                if (paymentStatusText !== paymentStatus) {
                    showRow = false;
                }
            }

            tr[i].style.display = showRow ? '' : 'none';
        }
    }
</script>




@endsection
