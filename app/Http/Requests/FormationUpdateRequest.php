<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FormationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "formation_name" => ["required", "string", "min:2"],
            "formation_description" => ["required", "min:10"],
            "formation_prix" => ["required", "string", "min:1"],
            // "image" => 'required|image',
            "checkboxCategories" => "nullable",
            "checkboxTypes" => "nullable",
        ];
    }
}
