<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Hotel Reservation</h1>

        <form action="{{ route('reserve.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="guest_name" placeholder="Your Name" class="w-full p-2 border rounded" required>
            <input type="email" name="email" placeholder="Your Email" class="w-full p-2 border rounded" required>
            <input type="date" name="check_in" class="w-full p-2 border rounded" required>
            <input type="date" name="check_out" class="w-full p-2 border rounded" required>
            <select name="room_type" class="w-full p-2 border rounded" required>
                <option value="">Select Room Type</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Deluxe">Deluxe</option>
            </select>
            <input type="number" name="guests" min="1" placeholder="Number of Guests" class="w-full p-2 border rounded" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Book Now</button>
        </form>
    </div>
</x-app-layout>