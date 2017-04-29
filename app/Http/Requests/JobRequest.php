<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'apply' => 'required',
            'type' => 'required',
            'location' => 'required',
            'category' => 'required',
            'apply_url' => 'sometimes|required|url',
            'apply_email' => 'sometimes|required|email',
            'salary' => 'numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Your job must have a title',
            'description.required'  => 'Your job must have a description',
            'apply.required' => 'Specify how to apply for job',
            'apply_url.required' => 'Specify the URL with which to apply for job',
            'apply_email.required' => 'Specify the Email address with which to apply for job',
            'type.required' => 'Specify job type',
            'location.required' => 'Specify location if job is not remote',
            'category.required' => 'Specify job category',
            'salary.numeric' => 'Salary must be a numeric value',
        ];
    }
}
