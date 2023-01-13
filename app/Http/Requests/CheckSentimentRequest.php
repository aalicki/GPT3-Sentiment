<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\Throttle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckSentimentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|min:4|max:180',
        ];
    }
}
