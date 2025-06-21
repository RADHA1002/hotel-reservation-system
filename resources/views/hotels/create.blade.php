@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Add Hotel</h2>
    <form method="POST" action="{{ route('hotels.store') }}">
        @csrf
        <div class="mb-4">
            <label>Name</label>
            <input name="name" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Location</label>
            <input name="location" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection
