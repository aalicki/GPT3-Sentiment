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

    public function index()
    {
        return view('sentiment.index');
    }

    /**
     * Any pre-flight checks before checking sentiment
     *
     * @param CheckSentimentRequest $request
     * @return Request
     */
    private function preCheck(CheckSentimentRequest $request)
    {
        return $request->validated();
    }

    public function processSentiment(CheckSentimentRequest $request)
    {

        // Pre-Checks
        $this->preCheck($request);

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

        return view('sentiment.index')
            ->with('text', $text)
            ->with('sentiment', $this->handleSentimentConfusion($result['choices'][0]['text']));
    }

    /**
     * Ensure we return one of three valid sentiment ratings
     *
     * @param $sentiment
     * @return string
     */
    private function handleSentimentConfusion(string $sentiment)
    {

        $sentiment = strtolower($sentiment);

        if (str_contains($sentiment, 'negative') || str_contains($sentiment, 'positive')) {
            return $sentiment;
        } else {

            return 'neutral';
        }

    }
}
