<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
        <h2 class="text-xl font-bold mb-4">Edit Reservation</h2>

        <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Guest Name</label>
                <input type="text" name="guest_name" value="{{ $reservation->guest_name }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ $reservation->email }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Check-In</label>
                <input type="date" name="check_in" value="{{ $reservation->check_in }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Check-Out</label>
                <input type="date" name="check_out" value="{{ $reservation->check_out }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Room Type</label>
                <input type="text" name="room_type" value="{{ $reservation->room_type }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Guests</label>
                <input type="number" name="guests" value="{{ $reservation->guests }}" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
