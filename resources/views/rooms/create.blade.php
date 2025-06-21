@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Add Room</h2>
    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf
        <div class="mb-4">
            <label>Hotel</label>
            <select name="hotel_id" class="w-full border p-2" required>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label>Room Type</label>
            <input name="room_type" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Capacity</label>
            <input type="number" name="capacity" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>
                <input type="checkbox" name="available" value="1" checked>
                Available
            </label>
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded">Add Room</button>
    </form>
</div>
@endsection
