@extends('layouts.admin')
@section('content')

<div class="flex justify-between items-center">
   <h2 class="text-2xl font-bold">Reservations</h2>
   <a href="/" class="text-blue-600 hover:text-blue-800">
   <i class="fas fa-arrow-left mr-2"></i>Back to Home
   </a>
</div>
<div>
   <div class="flex flex-wrap -mx-6 mt-8">
      <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/4 sm:mt-0">
         <a href="{{ route('admin.reservations.index') }}" class="block hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white cursor-pointer">
               <div class="p-3 rounded-full bg-yellow-600 bg-opacity-75">
                  <svg class="h-8 w-8 smoke-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M14 2.625C7.6875 2.625 2.625 7.6875 2.625 14C2.625 20.3125 7.6875 25.375 14 25.375C20.3125 25.375 25.375 20.3125 25.375 14C25.375 7.6875 20.3125 2.625 14 2.625Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M14 8.125V14L17.875 17.875" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </div>
               <div class="mx-5">
                  <h4 class="text-2xl font-semibold text-gray-700">{{ $totalReservations }}</h4>
                  <div class="text-gray-500">Total Reservations</div>
               </div>
            </div>
         </a>
      </div>
      <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/4 sm:mt-0">
         <div class="block hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white cursor-pointer">
               <div class="p-3 rounded-full bg-blue-600 bg-opacity-75">
                  <svg class="h-8 w-8 smoke-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M14 2.625C7.6875 2.625 2.625 7.6875 2.625 14C2.625 20.3125 7.6875 25.375 14 25.375C20.3125 25.375 25.375 20.3125 25.375 14C25.375 7.6875 20.3125 2.625 14 2.625Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M14 15.5V21.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M14 12.5L18.5 16.5L14 20.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </div>
               <div class="mx-5">
                  <h4 class="text-2xl font-semibold text-gray-700">{{ $todayCheckoutsCount }}</h4>
                  <div class="text-gray-500">Today's Checkouts</div>
               </div>
            </div>
         </div>
      </div>
      <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/4 sm:mt-0">
         <a href="{{ route('admin.reservations.index') }}" class="block hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white cursor-pointer">
               <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                  <svg class="h-8 w-8 smoke-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M14 2.625C7.6875 2.625 2.625 7.6875 2.625 14C2.625 20.3125 7.6875 25.375 14 25.375C20.3125 25.375 25.375 20.3125 25.375 14C25.375 7.6875 20.3125 2.625 14 2.625Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M14 8.125V14L17.875 17.875" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </div>
               <div class="mx-5">
                  <h4 class="text-2xl font-semibold text-gray-700">{{ $upcomingCheckins }}</h4>
                  <div class="text-gray-500">Upcoming Check-ins</div>
               </div>
            </div>
         </a>
      </div>
      <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/4 xl:mt-0">
         <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
            <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
               <svg class="h-8 w-8 smoke-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.5 2.625H9.5C8.3125 2.625 7.375 3.5625 7.375 4.75V23.25C7.375 24.4375 8.3125 25.375 9.5 25.375H18.5C19.6875 25.375 20.625 24.4375 20.625 23.25V4.75C20.625 3.5625 19.6875 2.625 18.5 2.625Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M14 22.25C14.725 22.25 15.3125 21.6625 15.3125 20.9375C15.3125 20.2125 14.725 19.625 14 19.625C13.275 19.625 12.6875 20.2125 12.6875 20.9375C12.6875 21.6625 13.275 22.25 14 22.25Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
            </div>
            <div class="mx-5">
               <h4 class="text-2xl font-semibold text-gray-700">{{ $totalRooms }}</h4>
               <div class="text-gray-500">Total Rooms</div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="mt-8">
   <div class="flex flex-col mt-8">
      <h2 class="text-xl font-bold">Today's Check-ins</h2>
      <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
         <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
               <thead>
                  <tr>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Room Type</th>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Check-in</th>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Check-out</th>
                  </tr>
               </thead>
               <tbody class="bg-white">
                  @forelse ($todaysCheckins as $checkin)
                  <tr class="bg-blue-50">
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkin->guest_name }}</div>
                     </td>
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkin->room_type }}</div>
                     </td>
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkin->check_in }}</div>
                     </td>
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkin->check_out }}</div>
                     </td>
                  </tr>
                  @empty
                  <tr class="bg-blue-50">
                     <td colspan="4" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">No check-ins for today.</div>
                     </td>
                  </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<div class="mt-8">
   <div class="flex flex-col mt-8">
      <h2 class="text-xl font-bold">Today's Check-outs</h2>
      <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
         <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
               <thead>
                  <tr>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Room Type</th>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Check-in</th>
                     <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Check-out</th>
                  </tr>
               </thead>
               <tbody class="bg-white">
                  @forelse ($todaysCheckouts as $checkout)
                  <tr class="bg-red-50">
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkout->guest_name }}</div>
                     </td>
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkout->room_type }}</div>
                     </td>
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkout->check_in }}</div>
                     </td>
                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">{{ $checkout->check_out }}</div>
                     </td>
                  </tr>
                  @empty
                  <tr class="bg-red-50">
                     <td colspan="4" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">No checkouts for today.</div>
                     </td>
                  </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection