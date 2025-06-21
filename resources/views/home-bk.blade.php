<form id="groq-form">
    <input type="text" name="prompt" id="prompt" />
    <button type="submit">Ask</button>
</form>
<div id="result"></div>

<script>
document.getElementById('groq-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    let prompt = document.getElementById('prompt').value;

    let response = await fetch('/groq-chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        body: JSON.stringify({ prompt: prompt })
    });

    let data = await response.json();
    document.getElementById('result').innerText = data.response || data.error;
});
</script>
