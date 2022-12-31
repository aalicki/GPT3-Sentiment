<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckSentimentRequest;
use Illuminate\Http\Request;
use OpenAI;

class SentimentController extends Controller
{

    /**
     * AI Model (Default should be text-davinci-003)
     * Alt AI Model = text-curie-001 (cheaper + faster)
     *
     * @var string
     */
    private string $AIModel = 'text-davinci-003';

    /**
     * Max tokens to be used in a request
     * 1 token = 4 characters of text (generally)
     * See: https://beta.openai.com/tokenizer
     * @var int
     */
    private int $maxTokens = 46;

    /**
     * How precise should the AI model generate feedback
     * Lower = less random
     * Higher = more random
     * Ranges from 0 to 1 (e.g,; .89)
     * @var int
     */
    private int $temperature = 0;

    public function processSentiment(CheckSentimentRequest $request)
    {

        $validated = $request->validate([
            'text' => 'string|required|min:4',
        ]);


        // Reduce max tokens for this, not needed
        $this->maxTokens = 4;

        $client = OpenAI::client(env('OPEN_AI_KEY'));

        // Given text to process sentiment
        $text = $request->input('text');

        $result = $client->completions()->create([
            'model'         => $this->AIModel,
            'prompt'        => 'What is the overall sentiment of this text: '. $text,
            'max_tokens'    => $this->maxTokens,
            'temperature'   => $this->temperature
        ]);

        $sentiment = $result['choices'][0]['text'];

        return redirect('/')
            ->with('text', $text)
            ->with('sentiment', $sentiment);
    }
}
