@component('mail::message')
# Booking Confirmation

Thank you for your booking! Here are your booking details:

- **Booking ID:** #{{ $booking->id }}
- **Room:** {{ $booking->room->name }}
- **Check-in Date:** {{ \Carbon\Carbon::parse($booking->check_in)->format('F j, Y') }}
- **Check-out Date:** {{ \Carbon\Carbon::parse($booking->check_out)->format('F j, Y') }}
- **Total Nights:** {{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }}

If you have any questions about your booking, please don't hesitate to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
