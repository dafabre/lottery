<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CombinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'draws.*.first_draw' => 'required|
                                    different:draws.*.second_draw|
                                    different:draws.*.third_draw|
                                    different:draws.*.fourth_draw|
                                    different:draws.*.fifth_draw|
                                    different:draws.*.sixth_draw',
            'draws.*.second_draw' => 'required|
                                    different:draws.*.first_draw|
                                    different:draws.*.third_draw|
                                    different:draws.*.fourth_draw|
                                    different:draws.*.fifth_draw|
                                    different:draws.*.sixth_draw',
            'draws.*.third_draw' => 'required|
                                    different:draws.*.first_draw|
                                    different:draws.*.second_draw|
                                    different:draws.*.fourth_draw|
                                    different:draws.*.fifth_draw|
                                    different:draws.*.sixth_draw',
            'draws.*.fourth_draw' => 'required|
                                    different:draws.*.first_draw|
                                    different:draws.*.second_draw|
                                    different:draws.*.third_draw|
                                    different:draws.*.fifth_draw|
                                    different:draws.*.sixth_draw',
            'draws.*.fifth_draw' => 'required|
                                    different:draws.*.first_draw|
                                    different:draws.*.second_draw|
                                    different:draws.*.third_draw|
                                    different:draws.*.fourth_draw|
                                    different:draws.*.sixth_draw',
            'draws.*.sixth_draw' => 'required|
                                    different:draws.*.first_draw|
                                    different:draws.*.second_draw|
                                    different:draws.*.third_draw|
                                    different:draws.*.fourth_draw|
                                    different:draws.*.fifth_draw',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'draws.*.first_draw.required' => 'required field',
            'draws.*.second_draw.required' => 'required field',
            'draws.*.third_draw.required' => 'required field',
            'draws.*.fourth_draw.required' => 'required field',
            'draws.*.fifth_draw.required' => 'required field',
            'draws.*.sixth_draw.required' => 'required field',
            'draws.*.first_draw.different' => 'numbers must not repeat',
            'draws.*.second_draw.different' => 'numbers must be repeat',
            'draws.*.third_draw.different' => 'numbers must be repeat',
            'draws.*.fourth_draw.different' => 'numbers must be repeat',
            'draws.*.fifth_draw.different' => 'numbers must be repeat',
            'draws.*.sixth_draw.different' => 'numbers must be repeat',
        ];
    }
}
