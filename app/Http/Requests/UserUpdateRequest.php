<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            "modifFirstName" => ["required", "string"],
            "modifLastName" => ["required", "string"],
            "modifEmail" => ["required", "email"],
            "modifPassword" => 'string',
            "user_image" => 'image',
        ];
    }
}
