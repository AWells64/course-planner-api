<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => ["required", "string", "max:100"],
            "description" => ["required", "string", "min:10"],
            "complete" => ["boolean"],
            "price" => ["required", "string", "max:10"],
            "rating" => ["required", "integer"],
            "difficulty" => ["required", "string", "max:20"],
            "score" => ["required", "integer"],
        ];
    }
}
