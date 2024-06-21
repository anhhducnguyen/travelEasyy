<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .invoice-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }

        .total-section {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
            text-align: right;
        }

        .total-price {
            font-size: 22px;
            font-weight: bold;
            color: #1a73e8;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <h1>Invoice</h1>
        <p><strong>Booking ID:</strong> {{ $booking->idBooking }}</p>
        <p><strong>User Name:</strong> {{ $booking->user->name }}</p>
        <p><strong>Tour Name:</strong> {{ $booking->tour->name }}</p>
        <p><strong>Quantity Ticket:</strong> {{ $booking->quantityTicket }}</p>
        <p><strong>Payment methods:</strong> Cash</p>
        <div class="total-section">
            <p><strong>Total Price:</strong> ${{ number_format($booking->tour->cost * $booking->quantityTicket + 3, 2) }}</p>
        </div>
        <div class="footer">
            <p>Travel Easy,</p>
            <p>Simplify Your Journey with TravelEasy</p>
        </div>
    </div>
</body>
</html>
