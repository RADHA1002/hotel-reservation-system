<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Booking Confirmation</h2>
    <p>Dear {{ $reservation->guest_name }},</p>
    <p>Thank you for your reservation. Here are your booking details:</p>
    <ul>
        <li><strong>Check-In:</strong> {{ $reservation->check_in }}</li>
        <li><strong>Check-Out:</strong> {{ $reservation->check_out }}</li>
        <li><strong>Room Type:</strong> {{ $reservation->room_type }}</li>
        <li><strong>Number of Guests:</strong> {{ $reservation->guests }}</li>
    </ul>
    <p>If you have any questions, feel free to contact us.</p>
    <p>Best regards,<br>Hotel Management</p>
</body>
</html>
