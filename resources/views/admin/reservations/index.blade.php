@extends('layouts.admin')
@section('content')

<div class="mt-8 mx-auto max-w-6xl">
   <div class="bg-white shadow rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Reservations</h2>
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
            </a>
      </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

      @if ($reservations->count())
      <table class="min-w-full bg-white border" style="width: 100%;">
         <thead>
            <tr class="bg-gray-100 text-left">
               <th class="py-2 px-4 border-b">Name</th>
               <th class="py-2 px-4 border-b">Email</th>
               <th class="py-2 px-4 border-b">Check-In</th>
               <th class="py-2 px-4 border-b">Check-Out</th>
               <th class="py-2 px-4 border-b">Room Type</th>
               <th class="py-2 px-4 border-b">Guests</th>
               <th class="py-2 px-4 border-b">Actions</th>
               <th class="py-2 px-4 border-b">Payment</th>
               <th class="py-2 px-4 border-b">Check-In Status</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($reservations as $reservation)
            <tr>
               <td class="py-2 px-4 border-b">{{ $reservation->guest_name }}</td>
               <td class="py-2 px-4 border-b">{{ $reservation->email }}</td>
               <td class="py-2 px-4 border-b">{{ $reservation->check_in }}</td>
               <td class="py-2 px-4 border-b">{{ $reservation->check_out }}</td>
               <td class="py-2 px-4 border-b">{{ $reservation->room_type }}</td>
               <td class="py-2 px-4 border-b">{{ $reservation->guests }}</td>
               <td class="py-2 px-4 border-b">
                    <div class="relative inline-block text-left">
                        <button type="button" class="dropdown-button inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" aria-haspopup="true" aria-expanded="false">
                            Actions
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none hidden" style="z-index: 1000;" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <div class="py-1">
                                <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Edit</a>
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-red-50 hover:text-red-900" role="menuitem" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                <form action="{{ route('admin.reservations.sendConfirmation', $reservation->id) }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-50 hover:text-indigo-900" role="menuitem">Send Confirmation</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="py-2 px-4 border-b">
                    <form action="{{ route('admin.reservations.togglePayment', $reservation->id) }}" method="POST">
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-sm px-2 py-1 rounded {{ $reservation->payment_status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $reservation->payment_status ? 'Done' : 'Not Done' }}
                        </button>
                    </form>
                </td>

                <td class="py-2 px-4 border-b">
                    <form action="{{ route('admin.reservations.toggleCheckInStatus', $reservation->id) }}" method="POST">
                        @csrf
                        @php
                            $status = $reservation->checkin_status ?? 'PENDING';
                            $isDisabled = $status === 'CHECK_OUT';
                            $colors = [
                                'PENDING' => 'bg-gray-100 text-gray-800',
                                'CHECK_IN' => 'bg-green-100 text-green-800',
                                'CHECK_OUT' => 'bg-blue-100 text-blue-800',
                            ];
                        @endphp
                        <button 
                            type="submit" 
                            {{ $isDisabled ? 'disabled' : '' }}
                            onclick="return {{ $isDisabled ? 'false' : 'confirm(\'Are you sure?\')' }}" 
                            class="text-sm px-3 py-1 rounded font-semibold {{ $colors[$status] }} {{ $isDisabled ? 'opacity-60 cursor-not-allowed' : 'hover:shadow' }}">
                            {{ $status }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="mt-6">
         {{ $reservations->links() }}
      </div>
      @else
      <p>No reservations found.</p>
      @endif
   </div>
</div>
<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listeners to all dropdown buttons
        document.querySelectorAll('.dropdown-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get the dropdown menu
                const menu = this.parentElement.querySelector('.dropdown-menu');
                
                // Close all other menus
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    if (m !== menu) {
                        m.classList.add('hidden');
                    }
                });
                
                // Toggle this menu
                if (menu) {
                    menu.classList.toggle('hidden');
                }
                
                // Close menu when clicking outside
                document.addEventListener('click', function handleClick(e) {
                    if (menu && !menu.contains(e.target) && !button.contains(e.target)) {
                        menu.classList.add('hidden');
                        document.removeEventListener('click', handleClick);
                    }
                });
            });
        });
    });
</script>
@endsection