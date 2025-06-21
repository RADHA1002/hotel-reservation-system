<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Ask Our AI Agent</h2>

        <form x-data="{ question: '', answer: '' }" @submit.prevent="
            fetch('{{ route('ai.ask') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ question })
            })
            .then(res => res.json())
            .then(data => answer = data.answer)
        ">

            <input x-model="question" type="text" placeholder="Ask something..." class="w-full p-2 border rounded mb-2" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Ask</button>

            <div class="mt-4 p-4 bg-gray-100 rounded" x-show="answer">
                <strong>AI:</strong>
                <p x-text="answer"></p>
            </div>
        </form>
    </div>
</x-app-layout>
