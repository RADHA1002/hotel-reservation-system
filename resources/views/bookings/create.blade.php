@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Book Room: {{ $room->room_type }} (RM{{ $room->price }})</h2>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">

        <div class="mb-4">
            <label>Check-in Date</label>
            <input type="date" name="check_in" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Check-out Date</label>
            <input type="date" name="check_out" class="w-full border p-2" required>
        </div>

        <button class="bg-green-500 text-white px-4 py-2 rounded">Book Now</button>
    </form>
</div>
@endsection
