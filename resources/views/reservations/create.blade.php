<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
        <h2 class="text-2xl font-bold mb-4">Book a Room</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Name</label>
                <input type="text" name="guest_name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Check-In</label>
                <input type="date" name="check_in" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Check-Out</label>
                <input type="date" name="check_out" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Room Type</label>
                <select name="room_type" class="w-full border p-2 rounded" required>
                    <option value="">Choose a room</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Number of Guests</label>
                <input type="number" name="guests" min="1" class="w-full border p-2 rounded" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Submit Reservation
            </button>
        </form>
    </div>
</x-app-layout>
