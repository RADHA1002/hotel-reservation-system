@extends('layouts.app')
@section('content')
<div class="p-6">
    <a href="{{ route('rooms.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Room</a>

    <h2 class="text-xl font-bold mt-4 mb-2">Room List</h2>
    <ul>
        @foreach ($rooms as $room)
            <li class="border-b py-2">
                {{ $room->room_type }} - RM{{ $room->price }} - Capacity: {{ $room->capacity }} - 
                {{ $room->available ? 'Available' : 'Not Available' }} 
                (Hotel: {{ $room->hotel->name }})
            </li>
            <a href="{{ route('bookings.create', $room->id) }}" class="text-blue-500 hover:underline ml-2">Book</a>
        @endforeach
    </ul>
</div>
@endsection
