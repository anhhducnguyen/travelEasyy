<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>

    <p>Thank you for choosing our tour service at Travel Easy! We are delighted to have you as our customer starting from {{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y') }}.</p>

    <p>Your booked tour details:</p>
    <ul>
        <li><strong>Tour Name:</strong> {{ $tour->name }}</li>
        <li><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($tour->startDay)->format('d/m/Y') }}</li>
        <li><strong>End Date:</strong> {{ \Carbon\Carbon::parse($tour->endDay)->format('d/m/Y') }}</li>
        <li><strong>Price:</strong> {{ $tour->cost }} $</li>
        <li><strong>ServiceFee:</strong> {{ $serviceFee }} $</li>
        <li><strong>Number of Guests:</strong> {{ $booking->quantityTicket }}</li>
        <li><strong>Total Price:</strong> {{ $totalPrice }} $</li>
    </ul>

    <p>If you have any special requests or need further assistance during your stay, please feel free to contact us.</p>

    <p>Thank you once again for choosing us, and we look forward to hosting you as our valued guest.</p>

    <p>Best regards,<br>Travel Easy</p>
</body>
</html>
