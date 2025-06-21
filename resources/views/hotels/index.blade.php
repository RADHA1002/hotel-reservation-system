@extends('layouts.app')

@section('content')


<div class="p-6">

<form method="POST" action="{{ route('ollama.ask') }}">
    @csrf
    <input type="text" name="question" placeholder="Ask AI locally..." class="border px-2 py-1">
    <button type="submit" class="bg-gray-800 text-white px-4 py-1 rounded">Ask Local AI</button>
</form>

    <a href="{{ route('hotels.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Hotel</a>

    <h2 class="text-xl font-bold mt-4 mb-2">Hotels List</h2>
    <ul>
        @foreach ($hotels as $hotel)
            <li class="border-b py-2">{{ $hotel->name }} - {{ $hotel->location }}</li>
        @endforeach
    </ul>
</div>
@endsection
