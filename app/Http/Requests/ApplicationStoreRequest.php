<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
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
            "name" => "required|string|max: 64",
            "image" => "required|image|max: 4096",
            "description" => "required|string|max: 5000",
            "finish_date" => "required|date|after:yesterday",
            "status_id" => "required|exists:statuses,id"
        ];
    }

}
