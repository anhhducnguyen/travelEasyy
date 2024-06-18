<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation by Admin</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>


    <p>Thank you for booking a tour with us! We are delighted to have you as our customer. The tour you booked (<strong>{{$tour->name}}, {{ \Carbon\Carbon::parse($tour->startDay)->format('d/m/Y') }} to {{ \Carbon\Carbon::parse($tour->endtDay)->format('d/m/Y') }}</strong>) has been confirmed by Admin, please arrive 30 minutes before departure time to complete payment and related procedures. Please provide <strong>your email and phone number</strong>  to the company's staff for support.</p>

    <p>If you have any special requests or need further assistance during your stay, please feel free to contact us.</p>

    <p>Thank you once again for choosing us, and we look forward to hosting you as our valued guest.</p>

    <p>Best regards,<br>Travel Easy</p>
</body>
</html>
