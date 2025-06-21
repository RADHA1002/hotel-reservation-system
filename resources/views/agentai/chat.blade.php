@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Ask Agent AI</h2>

    <div id="chat-box" class="border h-64 overflow-y-auto p-4 bg-gray-100 mb-4 rounded-lg"></div>

    <form id="chat-form" class="flex space-x-2">
        <input id="user-message" type="text" class="flex-1 border p-2 rounded" placeholder="Ask something like 'Show me available rooms'" required>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Send</button>
    </form>
</div>

<script>
document.getElementById('chat-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const input = document.getElementById('user-message');
    const message = input.value;
    input.value = '';

    const chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += `<p><strong>You:</strong> ${message}</p>`;

    const response = await fetch('{{ route('agentai.respond') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message })
    });

    const data = await response.json();
    chatBox.innerHTML += `<p><strong>Agent AI:</strong> ${data.response.replace(/\n/g, "<br>")}</p>`;
    chatBox.scrollTop = chatBox.scrollHeight;
});
</script>
@endsection
