<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScenarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'scenario_name.*' => 'required',
            'case.*' => 'required',
            'test_step_id.*' => 'required',
            'test_step.*' => 'required',
            'expected_result.*' => 'required',
            'category.*' => 'required',
            'severity.*' => 'required',
            'status.*' => 'required',
        ];
    }


    public function message()
    {
        return [
            'scenario_name.*.required' => 'Required',
            'case.*.required' => 'Required',
            'test_step.*.required' => 'Required',
            'test_step_id.*.equired' => 'Required',
            'expected_result.*.required' => 'Required',
            'category.*.required' => 'Required',
            'severity.*.required' => 'Required',
            'status.*.required' => 'Required',
        ];
    }
}
