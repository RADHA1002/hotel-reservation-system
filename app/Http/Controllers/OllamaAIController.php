<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OllamaAIController extends Controller
{
    public function ask(Request $request)
    {
        $prompt = $request->input('question');

        

        $response = Http::post('http://localhost:11434/api/generate', [
            'model' => 'mistral', // or llama2, etc.
            'prompt' => $prompt,
            'stream' => false
        ]);

        $data = $response->json();
        return response()->json(['response' => $data['response'] ?? 'No response']);
    }
}