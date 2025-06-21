@component('mail::message')
# Reservation Confirmation

Thank you for your reservation! Here are your booking details:

- **Reservation ID:** #{{ $reservation->id }}
- **Guest Name:** {{ $reservation->guest_name }}
- **Email:** {{ $reservation->email }}
- **Room Type:** {{ $reservation->room_type }}
- **Check-in Date:** {{ $reservation->check_in->format('F j, Y') }}
- **Check-out Date:** {{ $reservation->check_out->format('F j, Y') }}
- **Number of Guests:** {{ $reservation->guests }}
- **Total Nights:** {{ $reservation->check_in->diffInDays($reservation->check_out) }}

@if(isset($reservation->room) && $reservation->room)
- **Room Number:** {{ $reservation->room->room_number ?? 'N/A' }}
- **Room Price:** {{ number_format($reservation->room->price ?? 0, 2) }} {{ config('app.currency', '$') }}
@endif

If you have any questions about your reservation, please don't hesitate to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
