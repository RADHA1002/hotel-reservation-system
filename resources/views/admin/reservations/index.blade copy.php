<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6">All Reservations</h2>

        <div class="overflow-x-auto bg-white shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guest</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Check-in</th>
                        <th class="px-6 py-3">Check-out</th>
                        <th class="px-6 py-3">Room</th>
                        <th class="px-6 py-3">Guests</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($reservations as $res)

                        <tr>
                            <td class="px-6 py-4">{{ $res->guest_name }}</td>
                            <td class="px-6 py-4">{{ $res->email }}</td>
                            <td class="px-6 py-4">{{ $res->check_in }}</td>
                            <td class="px-6 py-4">{{ $res->check_out }}</td>
                            <td class="px-6 py-4">{{ $res->room_type }}</td>
                            <td class="px-6 py-4">{{ $res->guests }}</td>

                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('reservations.edit', $res->id) }}" class="text-blue-600 hover:underline">Edit</a>

                                    <form action="{{ route('reservations.destroy', $res->id) }}" method="POST" class="inline">
                                        @csrf
                                         @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                             </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center">No reservations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $reservations->links() }}
        </div>
    </div>
</x-app-layout>
